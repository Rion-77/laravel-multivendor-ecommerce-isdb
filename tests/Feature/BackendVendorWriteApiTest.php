<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;

function vendorWriteOwner(string $email = 'owner@example.test'): User
{
    $role = new Role();
    $role->id = 3;
    $role->name = 'Vendor';
    $role->save();

    return User::factory()->create([
        'role_id' => $role->id,
        'name' => 'Vendor Owner',
        'email' => $email,
        'phone' => '+14155550123',
    ]);
}

function vendorWritePayload(User $owner, array $overrides = []): array
{
    return array_merge([
        'user_id' => $owner->id,
        'shop_name' => 'Northwind Goods',
        'slug' => 'northwind-goods',
        'description' => 'A vendor shop description.',
        'commission_rate' => 10.25,
        'status' => 'active',
        'owner' => [
            'name' => 'Updated Vendor Owner',
            'email' => $owner->email,
            'phone' => $owner->phone,
        ],
    ], $overrides);
}

it('creates and updates vendor shops and linked owner profile through the admin API', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $owner = vendorWriteOwner();

    $this->actingAs($admin)
        ->getJson('/api/backend/vendors/options')
        ->assertOk()
        ->assertJsonPath('owners.0.id', $owner->id)
        ->assertJsonPath('statuses.0', 'active');

    $createPayload = vendorWritePayload($owner);
    unset($createPayload['slug']);

    $this->actingAs($admin)
        ->postJson('/api/backend/vendors', $createPayload)
        ->assertCreated()
        ->assertJsonPath('vendor.shop_name', 'Northwind Goods')
        ->assertJsonPath('vendor.slug', 'northwind-goods')
        ->assertJsonPath('vendor.user.name', 'Updated Vendor Owner')
        ->assertJsonPath('vendor.user.email', 'owner@example.test')
        ->assertJsonMissingPath('vendor.user.password');

    $vendor = Vendor::where('slug', 'northwind-goods')->firstOrFail();
    $this->assertDatabaseHas('users', [
        'id' => $owner->id,
        'name' => 'Updated Vendor Owner',
    ]);

    $this->patchJson("/api/backend/vendors/{$vendor->id}", vendorWritePayload($owner, [
        'shop_name' => 'Northwind Market',
        'slug' => 'northwind-market',
        'description' => 'Updated shop description.',
        'commission_rate' => 12.5,
        'status' => 'suspended',
        'owner' => [
            'name' => 'Northwind Owner',
            'email' => 'northwind-owner@example.test',
            'phone' => '+14155550987',
        ],
    ]))
        ->assertOk()
        ->assertJsonPath('vendor.slug', 'northwind-market')
        ->assertJsonPath('vendor.status', 'suspended')
        ->assertJsonPath('vendor.user.name', 'Northwind Owner')
        ->assertJsonPath('vendor.user.email', 'northwind-owner@example.test');

    $this->assertDatabaseHas('vendors', [
        'id' => $vendor->id,
        'shop_name' => 'Northwind Market',
        'slug' => 'northwind-market',
        'commission_rate' => 12.5,
        'status' => 'suspended',
    ]);
    $this->assertDatabaseHas('users', [
        'id' => $owner->id,
        'email' => 'northwind-owner@example.test',
        'phone' => '+14155550987',
    ]);
});

it('validates vendor fields, owner role and linked owner profile fields', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $owner = vendorWriteOwner();
    $this->actingAs($admin);

    $this->postJson('/api/backend/vendors', vendorWritePayload($owner, [
        'slug' => 'Not a valid slug!',
        'commission_rate' => 16,
        'status' => 'unknown',
        'owner' => [
            'name' => '',
            'email' => 'not-an-email',
            'phone' => 'invalid',
        ],
    ]))
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'commission_rate',
            'status',
            'owner.name',
            'owner.email',
            'owner.phone',
        ]);

    $ordinaryUser = User::factory()->create(['role_id' => 2]);
    $this->postJson('/api/backend/vendors', vendorWritePayload($ordinaryUser))
        ->assertUnprocessable()
        ->assertJsonValidationErrors('user_id');

    $this->assertDatabaseCount('vendors', 0);
});

it('restricts vendor create and update to authenticated administrators', function () {
    $owner = vendorWriteOwner();
    $vendor = Vendor::factory()->create(['user_id' => $owner->id]);
    $payload = vendorWritePayload($owner);

    $this->postJson('/api/backend/vendors', $payload)->assertUnauthorized();
    $this->patchJson("/api/backend/vendors/{$vendor->id}", $payload)->assertUnauthorized();
    $this->getJson('/api/backend/vendors/options')->assertUnauthorized();

    $staff = User::factory()->create(['role_id' => 2]);
    $this->actingAs($staff)
        ->postJson('/api/backend/vendors', $payload)
        ->assertForbidden();
    $this->patchJson("/api/backend/vendors/{$vendor->id}", $payload)
        ->assertForbidden();
    $this->getJson('/api/backend/vendors/options')->assertForbidden();
});

it('preserves vendor list, detail and delete endpoints for administrators', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $owner = vendorWriteOwner();
    $vendor = Vendor::factory()->create(['user_id' => $owner->id]);

    $this->actingAs($admin)
        ->getJson('/api/backend/vendors')
        ->assertOk()
        ->assertJsonPath('vendors.data.0.user.id', $owner->id);

    $this->getJson("/api/backend/vendors/{$vendor->id}")
        ->assertOk()
        ->assertJsonPath('vendor.user.email', $owner->email);

    $this->deleteJson("/api/backend/vendors/{$vendor->id}")
        ->assertOk();
    $this->assertDatabaseMissing('vendors', ['id' => $vendor->id]);
});

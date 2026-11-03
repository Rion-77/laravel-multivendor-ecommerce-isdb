<?php

use App\Models\Role;
use App\Models\User;

function createStaffRole(string $name): Role
{
    $role = new Role();
    $role->name = $name;
    $role->save();

    return $role;
}

it('allows administrators to create and update staff users with role assignment', function () {
    $adminRole = createStaffRole('Admin');
    $staffRole = createStaffRole('Moderator');
    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $this->actingAs($admin);

    $this->postJson('/api/backend/users', [
        'name' => 'Morgan Moderator',
        'email' => 'morgan@example.test',
        'phone' => '+14152223333',
        'role_id' => $staffRole->id,
        'password' => 'secure-pass-123',
        'password_confirmation' => 'secure-pass-123',
    ])
        ->assertCreated()
        ->assertJsonPath('user.name', 'Morgan Moderator')
        ->assertJsonPath('user.role_id', $staffRole->id)
        ->assertJsonPath('user.role.name', 'Moderator')
        ->assertJsonMissingPath('user.password');

    $user = User::where('email', 'morgan@example.test')->firstOrFail();
    expect($user->password)->not->toBe('secure-pass-123');
    $this->assertDatabaseHas('users', ['id' => $user->id, 'role_id' => $staffRole->id]);

    $this->patchJson("/api/backend/users/{$user->id}", [
        'name' => 'Morgan Lead',
        'email' => 'morgan.lead@example.test',
        'phone' => '+14152224444',
        'role_id' => $adminRole->id,
    ])
        ->assertOk()
        ->assertJsonPath('user.name', 'Morgan Lead')
        ->assertJsonPath('user.role.name', 'Admin');

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
        'name' => 'Morgan Lead',
        'email' => 'morgan.lead@example.test',
        'phone' => '+14152224444',
        'role_id' => $adminRole->id,
    ]);
});

it('allows every role to be assigned and validates user fields', function () {
    $adminRole = createStaffRole('Admin');
    $customerRole = createStaffRole('Customer');
    $vendorRole = createStaffRole('Vendor');
    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $this->actingAs($admin);

    $this->postJson('/api/backend/users', [
        'name' => 'Invalid Staff',
        'email' => 'invalid@example.test',
        'phone' => '+14155550111',
        'role_id' => $customerRole->id,
        'password' => 'secure-pass-123',
        'password_confirmation' => 'secure-pass-123',
    ])->assertCreated()
        ->assertJsonPath('user.role.name', 'Customer');

    $this->postJson('/api/backend/users', [
        'name' => 'Vendor Account',
        'email' => 'another@example.test',
        'phone' => '+14155550222',
        'role_id' => $vendorRole->id,
        'password' => 'secure-pass-123',
        'password_confirmation' => 'secure-pass-123',
    ])->assertCreated()
        ->assertJsonPath('user.role.name', 'Vendor');

    $this->getJson('/api/backend/users')
        ->assertOk()
        ->assertJsonFragment(['name' => 'Customer'])
        ->assertJsonFragment(['name' => 'Vendor']);

    $customer = User::where('email', 'invalid@example.test')->firstOrFail();
    $this->patchJson("/api/backend/users/{$customer->id}", [
        'name' => $customer->name,
        'email' => $customer->email,
        'phone' => $customer->phone,
        'role_id' => $vendorRole->id,
    ])->assertOk()
        ->assertJsonPath('user.role.name', 'Vendor');

    $this->postJson('/api/backend/users', [
        'name' => 'Invalid User',
        'email' => 'invalid-fields@example.test',
        'phone' => '+14155550333',
        'role_id' => $customerRole->id,
        'password' => 'secure-pass-123',
        'password_confirmation' => 'mismatch',
    ])->assertUnprocessable()->assertJsonValidationErrors('password');
});

it('requires an authenticated administrator to create or update staff users and roles', function () {
    createStaffRole('Admin');
    $role = createStaffRole('Moderator');
    $user = User::factory()->create(['role_id' => $role->id]);
    $payload = [
        'name' => 'Blocked Staff',
        'email' => 'blocked@example.test',
        'phone' => '+15559876543',
        'role_id' => $role->id,
        'password' => 'secure-pass-123',
        'password_confirmation' => 'secure-pass-123',
    ];

    $this->postJson('/api/backend/users', $payload)->assertUnauthorized();
    $this->patchJson("/api/backend/users/{$user->id}", $payload)->assertUnauthorized();
    $this->postJson('/api/backend/roles', ['name' => 'Supervisor'])->assertUnauthorized();
    $this->patchJson("/api/backend/roles/{$role->id}", ['name' => 'Supervisor'])->assertUnauthorized();

    $staff = User::factory()->create(['role_id' => $role->id]);
    $this->actingAs($staff)
        ->postJson('/api/backend/roles', ['name' => 'Supervisor'])
        ->assertForbidden();
    $this->assertDatabaseMissing('roles', ['name' => 'Supervisor']);
});

it('allows administrators to create and update non-system roles', function () {
    $adminRole = createStaffRole('Admin');
    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $this->actingAs($admin);

    $this->postJson('/api/backend/roles', ['name' => 'Support'])
        ->assertCreated()
        ->assertJsonPath('role.name', 'Support')
        ->assertJsonPath('role.users_count', 0);

    $role = Role::where('name', 'Support')->firstOrFail();
    $this->patchJson("/api/backend/roles/{$role->id}", ['name' => 'Senior Support'])
        ->assertOk()
        ->assertJsonPath('role.name', 'Senior Support');

    $this->postJson('/api/backend/roles', ['name' => 'vendor'])
        ->assertUnprocessable()
        ->assertJsonValidationErrors('name');

    $this->assertDatabaseHas('roles', ['id' => $role->id, 'name' => 'Senior Support']);
    $this->assertDatabaseMissing('roles', ['name' => 'vendor']);
});

it('prevents administrators from changing their own assigned role or editing the built-in admin role', function () {
    $adminRole = createStaffRole('Admin');
    $staffRole = createStaffRole('Moderator');
    $vendorRole = createStaffRole('Vendor');
    $admin = User::factory()->create(['role_id' => $adminRole->id]);
    $this->actingAs($admin);

    $this->patchJson("/api/backend/users/{$admin->id}", [
        'name' => $admin->name,
        'email' => $admin->email,
        'phone' => $admin->phone,
        'role_id' => $staffRole->id,
    ])->assertUnprocessable()->assertJsonValidationErrors('role_id');

    $this->patchJson("/api/backend/roles/{$adminRole->id}", ['name' => 'Root'])
        ->assertStatus(409)
        ->assertJsonPath('success', false);

    $this->patchJson("/api/backend/roles/{$vendorRole->id}", ['name' => 'Marketplace Staff'])
        ->assertStatus(409)
        ->assertJsonPath('success', false);
});

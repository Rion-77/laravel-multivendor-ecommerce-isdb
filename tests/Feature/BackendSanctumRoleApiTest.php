<?php

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

function tokenProductPayload(Vendor $vendor, Category $category, Brand $brand, array $overrides = []): array
{
    return array_merge([
        'vendor_id' => $vendor->id,
        'category_id' => $category->id,
        'brand_id' => $brand->id,
        'name' => 'Vendor Market Backpack',
        'slug' => 'vendor-market-backpack',
        'description' => 'A sturdy backpack built for daily travel use.',
        'base_price' => '80.00',
        'offer_price' => '65.00',
        'status' => ProductStatus::PendingReview->value,
    ], $overrides);
}

it('issues Sanctum tokens for administrator and vendor logins and revokes them on logout', function () {
    $admin = User::factory()->create([
        'role_id' => 1,
        'email' => 'admin-token@example.com',
        'password' => Hash::make('safe-test-password'),
    ]);

    $login = $this->postJson('/api/backend/auth/login', [
        'email' => $admin->email,
        'password' => 'safe-test-password',
    ])->assertOk()
        ->assertJsonPath('user.id', $admin->id)
        ->assertJsonMissingPath('user.password');

    $token = $login->json('token');
    expect($token)->toBeString()->not->toBeEmpty();

    $this->withToken($token)->getJson('/api/backend/auth/me')
        ->assertOk()
        ->assertJsonPath('user.role_id', 1);

    $this->withToken($token)->postJson('/api/backend/auth/logout')->assertOk();
    $this->assertDatabaseMissing('personal_access_tokens', [
        'tokenable_id' => $admin->id,
        'name' => 'vue-admin',
    ]);
    Auth::forgetGuards();
    $this->withToken($token)->getJson('/api/backend/auth/me')->assertUnauthorized();

    $staff = User::factory()->create([
        'role_id' => 2,
        'password' => Hash::make('safe-test-password'),
    ]);
    $this->postJson('/api/backend/auth/login', [
        'email' => $staff->email,
        'password' => 'safe-test-password',
    ])->assertForbidden();

    $staffToken = $staff->createToken('test-staff')->plainTextToken;
    $this->withToken($staffToken)->getJson('/api/backend/auth/me')->assertForbidden();
});

it('requires Sanctum authentication and admin authorization for admin APIs', function () {
    $this->getJson('/api/backend/categories')->assertUnauthorized();

    $vendorUser = User::factory()->create(['role_id' => 3]);
    Vendor::factory()->create(['user_id' => $vendorUser->id]);
    $vendorToken = $vendorUser->createToken('test-vendor')->plainTextToken;

    foreach ([
        '/api/backend/categories',
        '/api/backend/brands',
        '/api/backend/vendors',
        '/api/backend/orders',
        '/api/backend/users',
        '/api/backend/roles',
        '/api/backend/customers',
    ] as $adminEndpoint) {
        $this->withToken($vendorToken)->getJson($adminEndpoint)->assertForbidden();
    }

    $this->withToken($vendorToken)->getJson('/api/backend/profile')->assertOk();
});

it('scopes vendor product reads and writes to their own shop and keeps vendor product status pending', function () {
    $vendorUser = User::factory()->create(['role_id' => 3]);
    $ownVendor = Vendor::factory()->create(['user_id' => $vendorUser->id]);
    $otherUser = User::factory()->create(['role_id' => 3]);
    $otherVendor = Vendor::factory()->create(['user_id' => $otherUser->id]);
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    $ownProduct = Product::factory()->create(tokenProductPayload($ownVendor, $category, $brand));
    $otherProduct = Product::factory()->create(tokenProductPayload($otherVendor, $category, $brand, [
        'name' => 'Another Shop Product',
        'slug' => 'another-shop-product',
    ]));
    $token = $vendorUser->createToken('test-vendor')->plainTextToken;

    $this->withToken($token)->getJson('/api/backend/products')
        ->assertOk()
        ->assertJsonCount(1, 'products.data')
        ->assertJsonPath('products.data.0.id', $ownProduct->id);
    $this->withToken($token)->getJson("/api/backend/products/{$otherProduct->id}")->assertNotFound();
    $this->withToken($token)->deleteJson("/api/backend/products/{$otherProduct->id}")->assertNotFound();

    $create = tokenProductPayload($otherVendor, $category, $brand, [
        'slug' => 'vendor-created-backpack',
    ]);
    unset($create['vendor_id']);
    unset($create['status']);
    $created = $this->withToken($token)->postJson('/api/backend/products', $create)
        ->assertCreated()
        ->assertJsonPath('product.vendor_id', $ownVendor->id)
        ->assertJsonPath('product.status', ProductStatus::PendingReview->value);

    $createdId = $created->json('product.id');
    $update = tokenProductPayload($ownVendor, $category, $brand, [
        'name' => 'Vendor Updated Backpack',
        'slug' => 'vendor-updated-backpack',
    ]);
    unset($update['vendor_id']);
    unset($update['status']);

    $this->withToken($token)->putJson("/api/backend/products/{$createdId}", $update)
        ->assertOk()
        ->assertJsonPath('product.status', ProductStatus::PendingReview->value);
    $this->assertDatabaseHas('products', [
        'id' => $createdId,
        'vendor_id' => $ownVendor->id,
        'status' => ProductStatus::PendingReview->value,
    ]);

    $this->withToken($token)->putJson("/api/backend/products/{$createdId}", [
        ...$update,
        'status' => ProductStatus::Active->value,
    ])->assertUnprocessable()
        ->assertJsonValidationErrors(['status']);

    $maliciousCreate = tokenProductPayload($otherVendor, $category, $brand, [
        'slug' => 'vendor-cannot-assign-shop',
    ]);
    $this->withToken($token)->postJson('/api/backend/products', $maliciousCreate)
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['vendor_id']);

    $maliciousStatus = $create;
    $maliciousStatus['status'] = ProductStatus::Active->value;
    $this->withToken($token)->postJson('/api/backend/products', $maliciousStatus)
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['status']);
});

it('permits administrator product management across vendor shops', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    $token = $admin->createToken('test-admin')->plainTextToken;

    $this->withToken($token)->postJson('/api/backend/products', tokenProductPayload($vendor, $category, $brand))
        ->assertCreated()
        ->assertJsonPath('product.vendor_id', $vendor->id);
});

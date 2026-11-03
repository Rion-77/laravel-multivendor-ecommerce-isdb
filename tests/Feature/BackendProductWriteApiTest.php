<?php

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

function backendProductPayload(Vendor $vendor, Category $category, Brand $brand, array $overrides = []): array
{
    return array_merge([
        'vendor_id' => $vendor->id,
        'category_id' => $category->id,
        'brand_id' => $brand->id,
        'name' => 'Canvas Travel Backpack',
        'slug' => 'canvas-travel-backpack',
        'description' => 'Durable backpack with multiple storage compartments.',
        'base_price' => '80.00',
        'offer_price' => '65.00',
        'status' => ProductStatus::PendingReview->value,
    ], $overrides);
}

it('creates products through the backend API and stores uploaded product images', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    Storage::fake(config('media-library.disk_name'));
    $payload = backendProductPayload($vendor, $category, $brand);
    unset($payload['slug']);

    $response = $this->actingAs($admin)->post('/api/backend/products', [
        ...$payload,
        'product_image' => [UploadedFile::fake()->image('backpack.jpg')],
    ], ['Accept' => 'application/json']);

    $response->assertCreated()
        ->assertJsonPath('success', true)
        ->assertJsonPath('product.name', 'Canvas Travel Backpack')
        ->assertJsonPath('product.category.name', $category->name)
        ->assertJsonPath('product.brand.name', $brand->name)
        ->assertJsonPath('product.vendor.shop_name', $vendor->shop_name);

    $product = Product::where('slug', 'canvas-travel-backpack')->firstOrFail();
    expect($product->hasMedia('product_image'))->toBeTrue();
    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'offer_price' => 65,
        'status' => ProductStatus::PendingReview->value,
    ]);
});

it('updates persisted product fields through the backend API', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    $product = Product::factory()->create([
        ...backendProductPayload($vendor, $category, $brand),
    ]);
    Storage::fake(config('media-library.disk_name'));

    $this->actingAs($admin)->post("/api/backend/products/{$product->id}", [
        ...backendProductPayload($vendor, $category, $brand, [
            'name' => 'Updated Canvas Backpack',
            'slug' => 'updated-canvas-backpack',
            'base_price' => '100.00',
            'offer_price' => '90.00',
            'status' => ProductStatus::Active->value,
        ]),
        '_method' => 'PATCH',
        'product_image' => [UploadedFile::fake()->image('updated-backpack.png')],
    ], ['Accept' => 'application/json'])
        ->assertOk()
        ->assertJsonPath('product.name', 'Updated Canvas Backpack')
        ->assertJsonPath('product.status', ProductStatus::Active->value);

    expect($product->fresh()->hasMedia('product_image'))->toBeTrue();
    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => 'Updated Canvas Backpack',
        'slug' => 'updated-canvas-backpack',
        'base_price' => 100,
        'offer_price' => 90,
        'status' => ProductStatus::Active->value,
    ]);
});

it('rejects invalid product fields', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    Product::factory()->create(backendProductPayload($vendor, $category, $brand));

    $this->actingAs($admin)
        ->postJson('/api/backend/products', backendProductPayload($vendor, $category, $brand, [
            'offer_price' => '90.00',
        ]))
        ->assertUnprocessable()
        ->assertJsonValidationErrors(['offer_price']);
});

it('generates a unique slug for products with duplicate names', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    $payload = backendProductPayload($vendor, $category, $brand);
    unset($payload['slug']);
    $this->actingAs($admin)
        ->postJson('/api/backend/products', $payload)
        ->assertCreated()
        ->assertJsonPath('product.slug', 'canvas-travel-backpack');

    $this->postJson('/api/backend/products', $payload)
        ->assertCreated()
        ->assertJsonPath('product.slug', 'canvas-travel-backpack-2');
});

it('restricts product creation and updates to authenticated administrators', function () {
    $vendor = Vendor::factory()->create();
    $category = Category::factory()->create();
    $brand = Brand::factory()->create();
    $payload = backendProductPayload($vendor, $category, $brand);

    $this->postJson('/api/backend/products', $payload)->assertUnauthorized();

    $staff = User::factory()->create(['role_id' => 2]);
    $this->actingAs($staff)
        ->postJson('/api/backend/products', $payload)
        ->assertForbidden();
});

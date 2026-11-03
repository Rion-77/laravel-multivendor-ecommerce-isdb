<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

it('creates and updates categories through the backend API', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    Storage::fake(config('media-library.disk_name'));

    $this->actingAs($admin)->post('/api/backend/categories', [
        'name' => 'Outdoor Living',
        'icon' => UploadedFile::fake()->image('outdoor.jpg'),
    ], ['Accept' => 'application/json'])
        ->assertCreated()
        ->assertJsonPath('category.name', 'Outdoor Living')
        ->assertJsonPath('category.slug', 'outdoor-living');

    $category = Category::where('slug', 'outdoor-living')->firstOrFail();
    expect($category->hasMedia('category_icon'))->toBeTrue();

    $this->postJson('/api/backend/categories', [
        'name' => 'Outdoor Living',
    ])->assertCreated()
        ->assertJsonPath('category.slug', 'outdoor-living-2');

    $this->actingAs($admin)->putJson("/api/backend/categories/{$category->id}", [
        'name' => 'Outdoor and Garden',
        'slug' => 'outdoor-and-garden',
    ])->assertOk()
        ->assertJsonPath('category.name', 'Outdoor and Garden');
});

it('creates and updates brands through the backend API', function () {
    $admin = User::factory()->create(['role_id' => 1]);

    $this->actingAs($admin)->postJson('/api/backend/brands', [
        'name' => 'Northstar',
    ])->assertCreated()
        ->assertJsonPath('brand.name', 'Northstar');

    $brand = Brand::where('name', 'Northstar')->firstOrFail();
    $this->putJson("/api/backend/brands/{$brand->id}", [
        'name' => 'Northstar Goods',
    ])->assertOk()
        ->assertJsonPath('brand.name', 'Northstar Goods');
});

it('restricts category and brand writes to authenticated administrators', function () {
    $this->postJson('/api/backend/categories', ['name' => 'Garden', 'slug' => 'garden'])
        ->assertUnauthorized();
    $this->postJson('/api/backend/brands', ['name' => 'Northstar'])
        ->assertUnauthorized();

    $staff = User::factory()->create(['role_id' => 2]);
    $this->actingAs($staff)
        ->postJson('/api/backend/categories', ['name' => 'Garden', 'slug' => 'garden'])
        ->assertForbidden();
    $this->postJson('/api/backend/brands', ['name' => 'Northstar'])
        ->assertForbidden();
});

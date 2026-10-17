<?php

use App\Models\Category;
use App\Models\User;

it('allows an admin to view and update a category', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $category = new Category();
    $category->name = 'Home Appliances';
    $category->slug = 'home-appliances';
    $category->save();

    $this->actingAs($admin)
        ->get(route('admin.categories.edit', $category))
        ->assertOk()
        ->assertSee('Edit Category')
        ->assertSee('Home Appliances');

    $this->actingAs($admin)
        ->put(route('admin.categories.update', $category), ['name' => 'Kitchen & Home'])
        ->assertRedirect(route('admin.categories.index'));

    $this->assertDatabaseHas('categories', [
        'id' => $category->id,
        'name' => 'Kitchen & Home',
        'slug' => 'kitchen-home',
    ]);
});

<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(30)->create();
        Product::factory(30)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::factory()->createMany([
            ['name' => 'Admin'],
            ['name' => 'Moderator'],
            ['name' => 'Vendor'],
            ['name' => 'Customer'],  
        ]);

        Category::factory()->createMany([
            ['name' => 'Shirt'],
            ['name' => 'Jeans'],
            ['name' => 'Foot Wear'],  
        ]);

        Brand::factory()->createMany([
            ['name' => 'Easy'],
            ['name' => 'Aarong'],
            ['name' => 'Apex'],  
        ]);
    }
}

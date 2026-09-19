<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->createMany([
            [
                'id' => 1,
                'name' => 'admin',
                'role_id' => 1,
                'email' => 'admin@example.com',
                'phone' => '(323) 731-4032',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 2,
                'name' => 'moderator',
                'role_id' => 2,
                'email' => 'moderator@example.com',
                'phone' => '+1.678.896.7979',
                'password' => Hash::make('password'),
            ],
            [
                'id' => 3,
                'name' => 'vendor',
                'role_id' => 3,
                'email' => 'vendor@example.com',
                'phone' => '+1-458-827-4388',
                'password' => Hash::make('password'),
            ],
        ]);

        User::factory(27)->create();
        Product::factory(30)->create();
        Vendor::factory(10)->create();

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

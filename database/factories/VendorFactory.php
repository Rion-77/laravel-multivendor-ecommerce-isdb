<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company();
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 30),
            'shop_name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(),
            'commission_rate' => $this->faker->randomFloat(2, 0, 15),
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
        ];
    }
}

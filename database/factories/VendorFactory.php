<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'user_id' => $this->faker->unique()->numberBetween(1, 30),
            'shop_name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'commission_rate' => $this->faker->randomFloat(2, 0, 15),
            'status' => $this->faker->randomElement(['active', 'inactive', 'suspended']),
        ];
    }
}

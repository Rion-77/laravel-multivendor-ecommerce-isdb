<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $basePrice = $this->faker->randomFloat(2, 500, 5000);

        return [
            'name' => $this->faker->words(3, true),
            'category_id' => $this->faker->numberBetween(1, 3),
            'vendor_id' => $this->faker->numberBetween(1, 10),
            'brand_id' => $this->faker->numberBetween(1, 3),
            'description' => $this->faker->sentence(),
            'base_price' => $basePrice,
            'offer_price' => $this->faker->randomFloat(2, 500, $basePrice),
            'status' => $this->faker->randomElement([ProductStatus::Active, ProductStatus::Inactive, ProductStatus::PendingReview, ProductStatus::OutOfStock, ProductStatus::Rejected]),
        ];
    }
} 

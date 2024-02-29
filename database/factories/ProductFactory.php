<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<Product> */
class ProductFactory extends Factory
{
    /** @return array<string, mixed> */
    public function definition(): array
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 1000),
            'title' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000000000),
            'description' => $this->faker->paragraph(),
        ];
    }
}

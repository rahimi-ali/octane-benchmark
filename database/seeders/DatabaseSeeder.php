<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            $products = ProductFactory::new()->count(1000)->make();

            $now = now()->toIso8601String();
            Product::query()->insert(array_map(fn ($x) => [...$x, 'created_at' => $now, 'updated_at' => $now], $products->toArray()));

            echo "Created 1000 products\n";
        }
    }
}

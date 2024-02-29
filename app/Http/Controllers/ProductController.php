<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController
{
    public function __invoke(): JsonResponse
    {
        $products = Product::query()
            ->whereIntegerInRaw('category_id', [1, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100])
            ->orderByDesc('id')
            ->paginate(perPage: 50, page: 3);

        return new JsonResponse([
            'products' => array_map(
                fn(Product $product) => [
                    'id' => $product->id,
                    'categoryId' => $product->category_id,
                    'title' => $product->title,
                    'price' => $product->price,
                    'description' => $product->description,
                ],
                $products->items()
            ),
        ]);
    }
}

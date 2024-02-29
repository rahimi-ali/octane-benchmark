<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class OrderController
{
    public function __invoke(PlaceOrderRequest $request): JsonResponse
    {
        $productIds = array_map(
            fn(array $product) => $product['id'],
            $request->input('products')
        );

        $products = Product::query()
            ->whereIntegerInRaw('id', $productIds)
            ->get()
            ->keyBy('id');

        $orderProducts = array_map(
            fn(array $product) => [
                'product_id' => $product['id'],
                'title' => $products[$product['id']]->title,
                'quantity' => $product['quantity'],
                'price' => $product['quantity'] * $products[$product['id']]->price,
            ],
            $request->input('products')
        );

        $total = array_reduce(
            $orderProducts,
            fn($carry, $orderProduct) => $carry + $orderProduct['price'],
            0
        );

        /** @var Order $order */
        $order = Order::query()->create([
            'user_id' => $request->input('userId'),
            'total' => $total,
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'address' => $request->input('address'),
        ]);

        $orderProducts = array_map(
            fn(array $orderProduct) => [
                ...$orderProduct,
                'order_id' => $order->id,
            ],
            $orderProducts
        );

        $order->products()->createMany($orderProducts);
        $order->load('products');

        return new JsonResponse([
            'id' => $order->id,
            'total' => $order->total,
            'products' => $order->products->map(fn(OrderProduct $orderProduct) => [
                'productId' => $orderProduct->product_id,
                'title' => $orderProduct->title,
                'quantity' => $orderProduct->quantity,
                'price' => $orderProduct->price,
            ]),
        ]);
    }
}

<?php

use App\Http\Controllers\HashController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PingController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('ping', PingController::class);

Route::post('hash', HashController::class);

Route::post('orders', OrderController::class);

Route::get('products', ProductController::class);

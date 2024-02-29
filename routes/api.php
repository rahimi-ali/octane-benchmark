<?php

use App\Http\Controllers\PingController;
use Illuminate\Support\Facades\Route;

Route::get('ping', PingController::class);

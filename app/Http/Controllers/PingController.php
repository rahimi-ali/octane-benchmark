<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PingController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'message' => 'pong',
        ]);
    }
}

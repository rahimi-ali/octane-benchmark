<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HashController
{
    public function __invoke(Request $request): JsonResponse
    {
        $hashed = Hash::make($request->input('password'));

        if (!Hash::check($request->input('password'), $hashed)) {
            return new JsonResponse(['error' => 'Hashing failed'], 500);
        }

        return new JsonResponse([
            'clear' => $request->input('password'),
            'hashed' => $hashed,
        ]);
    }
}

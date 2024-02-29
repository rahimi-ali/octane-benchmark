<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderRequest extends FormRequest
{
    /** @return array<string, string[]> */
    public function rules(): array
    {
        return [
            'userId' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'products' => ['required', 'array'],
            'products.*.id' => ['required', 'integer'],
            'products.*.quantity' => ['required', 'integer'],
        ];
    }
}

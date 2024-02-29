<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('title');
            $table->unsignedInteger('quantity');
            $table->unsignedDecimal('price', 14, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};

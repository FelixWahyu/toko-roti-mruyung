<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade')->index();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->index();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps()->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

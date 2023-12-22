<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->longText('product_object');
            $table->foreignId('amazing_sale_id')->constrained('amazing_sales');
            $table->longText('amazing_sale_object');
            $table->decimal('amazing_sale_discount_amount',20,3);
            $table->integer('number')->default(1);
            $table->decimal('final_product_price',20,3);
            $table->decimal('final_total_price',20,3)->comment('number * final_product_price');
            $table->foreignId('color_id')->nullable()->constrained('product_colors');
            $table->foreignId('guarantee_id')->nullable()->constrained('guarantees');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_items');
    }
};

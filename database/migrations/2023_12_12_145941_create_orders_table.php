<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('address_id')->nullable()->constrained('addresses');
            $table->foreignId('product_id')->constrained('products');
            $table->longText('address_object')->comment('برای مواقعی که آدرس کاربر تغییر میکند این آدرس همان آدرس سفارش اینجا ثابت خواهد ماند');
            $table->foreignId('payment_id')->nullable()->constrained('payments');
            $table->tinyInteger('payment_object')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->foreignId('delivery_id')->nullable()->constrained('deliver');
            $table->longText('delivery_object')->nullable();
            $table->decimal('delivery_amount', 20, 3)->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('delivery_date')->nullable();
            $table->decimal('order_final_amount', 20, 3)->nullable();
            $table->decimal('order_discount_amount', 20, 3);
            $table->foreignId('copan_id')->nullable()->constrained('copans');
            $table->longText('copan_object')->nullable();
            $table->decimal('order_copan_discount_amount')->nullable();
            $table->foreignId('common_discount_id')->nullable()->constrained('common_discount');
            $table->longText('common_discount_object')->nullable();
            $table->decimal('order_common_discount_amount', 20, 3)->nullable();
            $table->decimal('order_total_products_discount_amount')->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

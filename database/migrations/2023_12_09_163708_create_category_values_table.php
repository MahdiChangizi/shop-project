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
        Schema::create('category_values', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('category_attribute_id')->constrained('category_attributes');
            $table->foreignId('product_id')->constrained('products');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(0)->comment('value type is (0) => simple, 1 => multi values select by customers (affected on price) ');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_values');
    }
};

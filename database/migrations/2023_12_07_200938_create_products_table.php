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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('image');
            $table->string('slug')->unique()->nullable();
            $table->decimal('price', 20, 3);
            $table->decimal('weight', 10, 1);
            $table->decimal('width', 10, 1)->comment('cm unit');
            $table->decimal('height', 10, 1)->comment('cm unit');
            $table->decimal('length', 10, 1)->comment(' cm unit');
            $table->foreignId('brand_id')->constrained('brands');
            $table->foreignId('category_id')->constrained('product_categories');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('marketable')->default(1)->comment('1 => marketable, 0 => is not marketable');
            $table->string('tags');
            $table->tinyInteger('sold_number')->default(0)->comment('تعداد فروخته شده');
            $table->tinyInteger('frozen_number')->default(0)->comment('کالا هایی که مشتری ها در حال خریدشان هستند ولی هنوز نهایی نشده');
            $table->tinyInteger('marketable_number')->default(0);
            $table->timestamp('published_at');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

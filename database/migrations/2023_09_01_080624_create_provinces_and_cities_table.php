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
        Schema::create('provinces_and_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('provinces_and_cities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces_and_cities');
    }
};

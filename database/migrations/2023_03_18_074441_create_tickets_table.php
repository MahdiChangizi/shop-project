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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('description');
            $table->tinyInteger('status')->default(0); 
            $table->tinyInteger('seen')->default(0); 
            $table->foreignId('reference_id')->constrained('ticket_admins')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('ticket_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('priority_id')->constrained('ticket_priorities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ticket_id')->nullable()->constrained('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

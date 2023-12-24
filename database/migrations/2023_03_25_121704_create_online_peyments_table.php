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
        Schema::create('online_peyments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount' , 20 , 3);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('gateway')->nullable(); 
            $table->string('transaction_id')->nullable(); 
            $table->text('bank_first_response')->nullable(); 
            $table->text('bank_second_response')->nullable(); 
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
        Schema::dropIfExists('online_peyments');
    }
};

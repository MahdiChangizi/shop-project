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
        Schema::create('public_mail_files', function (Blueprint $table) {
            $table->id();
            $table->text('file_path');
            $table->string('file_type');
            $table->bigInteger('file_size');
            $table->foreignId('public_mail_id')->constrained('public_mail');
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
        Schema::dropIfExists('public_mail_files');
    }
};

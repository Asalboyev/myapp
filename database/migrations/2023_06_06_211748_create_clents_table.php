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
        Schema::create('clents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tel');
            $table->string('email');
            // $table->string('cars_id');
            $table->foreignId('apartments_id')
            ->constrained()
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clents');
    }
};

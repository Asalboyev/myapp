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
        Schema::create('apartment_car', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('apartment_id');
            // $table->bigInteger('car_id');
            $table->foreignId('apartment_id')
            ->constrained()
            ->onDelete('cascade');
             $table->foreignId('car_id')
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
        Schema::dropIfExists('apartment_car');
    }
};

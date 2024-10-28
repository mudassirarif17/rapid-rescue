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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('p_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('driver_id')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('p_lat')->nullable();
            $table->string('p_lang')->nullable();
            $table->string('isAccepted')->default('0');
            $table->string('isReached')->default('0');
            $table->string('condition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};

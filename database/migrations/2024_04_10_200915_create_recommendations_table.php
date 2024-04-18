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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('settlement');
            $table->string('state')->nullable();
            /*$table->integer('size');*/
            $table->integer('min_size')->nullable();
            $table->integer('max_size')->nullable();
            /*$table->integer('price');*/
            $table->integer('min_price')->nullable();
            $table->integer('max_price')->nullable();
            /*$table->integer('rooms');*/
            $table->integer('min_rooms')->nullable();
            $table->integer('max_rooms')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};

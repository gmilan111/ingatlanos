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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('settlement');
            $table->string('state');
            $table->integer('price');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->longText('description');
            $table->string('address');
            $table->integer('district')->default(null)->nullable();
            $table->integer('size');
            $table->string('condition')->default('Nincs megadva')->nullable();
            $table->string('year_construction')->default('Nincs megadva')->nullable();
            $table->integer('floor')->default(0)->nullable();
            $table->integer('building_levels')->default(0)->nullable();
            $table->string('lift');
            $table->string('inner_height')->default(0)->nullable();
            $table->string('air_conditioner');
            $table->string('accessible');
            $table->string('attic')->default('Nincs megadva')->nullable();
            $table->integer('balcony')->default(0)->nullable();
            $table->string('parking')->default('Nincs megadva')->nullable();
            $table->integer('parking_price')->default(0)->nullable();
            $table->integer('avg_gas')->default(0)->nullable();
            $table->integer('avg_electricity')->default(0)->nullable();
            $table->integer('overhead_cost')->default(0)->nullable();
            $table->integer('common_cost')->default(0)->nullable();
            $table->string('heating')->default('Nincs megadva')->nullable();
            $table->string('insulation')->default('Nincs megadva')->nullable();
            $table->string('type')->default('Nincs megadva')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

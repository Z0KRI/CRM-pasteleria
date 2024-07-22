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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description')->nullable();
            $table->enum('type', ['CONSUMABLE', 'SELLABLE']);
            //TODO revisar si esta bien implementado el nombre
            //? Según yo es el gramaje o el numero de piezas
            $table->float('properties');
            //? Es la relación precio peso de la que se habla
            $table->uuid('size_id')->nullable();
            $table->uuid('measure_unit_id');

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

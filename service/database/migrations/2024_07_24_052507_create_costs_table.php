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
        Schema::create('costs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('weight');
            $table->float('cost');
            $table->float('price')->nullable();
            $table->uuid('measure_id'); //Llave foranea
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('measure_id')->references('id')->on('measurement_units')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};

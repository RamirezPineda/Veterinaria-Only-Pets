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
        Schema::create('venta_servicios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_servicio')->nullable();
            $table->integer('id_venta');
            $table->integer('id_mascota')->nullable();
            $table->foreign('id_servicio')->references('id')->on('servicios')->nullOnDelete();
            $table->foreign('id_venta')->references('id')->on('ventas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_servicios');
    }
};

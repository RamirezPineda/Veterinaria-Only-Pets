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
            $table->id();
            $table->unsignedBigInteger('id_servicio')->nullable();
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_mascota');
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

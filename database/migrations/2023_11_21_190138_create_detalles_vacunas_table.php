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
        Schema::create('detalles_vacunas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_vacuna');
            $table->integer('id_historial');
            $table->integer('dosis');
            $table->date('fecha_aplicacion');
            $table->date('fecha_prox_aplicacion')->nullable();
            $table->foreign('id_vacuna')->references('id')->on('vacunas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_vacunas');
    }
};

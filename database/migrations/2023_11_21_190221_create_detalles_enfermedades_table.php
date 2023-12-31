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
        Schema::create('detalles_enfermedades', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_enfermedad');
            $table->integer('id_historial');
            $table->date('fecha_deteccion');
            $table->date('inicio_tratamiento')->nullable();
            $table->date('fin_tratamiento')->nullable();
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_enfermedad')->references('id')->on('enfermedades')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['id_enfermedad', 'id_historial']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_enfermedades');
    }
};

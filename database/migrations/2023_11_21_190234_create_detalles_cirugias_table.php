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
        Schema::create('detalles_cirugias', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_cirugia');
            $table->integer('id_historial');
            $table->date('fecha');
            $table->time('hora');
            $table->string('veterinario_encargado');
            $table->foreign('id_cirugia')->references('id')->on('cirugias')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_cirugias');
    }
};

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
        Schema::create('detalles_historial', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('descripcion');
            $table->date('fecha_consulta');
            $table->date('fecha_prox_consulta')->nullable();
            $table->integer('id_historial');
            $table->foreign('id_historial')->references('id')->on('historiales_clinicos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_historial');
    }
};

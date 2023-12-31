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
        Schema::create('clientes_mascotas', function (Blueprint $table) {
            $table->integer('id_cliente');
            $table->integer('id_mascota');
            $table->foreign('id_mascota')->references('id')->on('mascotas');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->primary(['id_cliente', 'id_mascota']);
            
            $table->unique(['id_cliente', 'id_mascota']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes_mascotas');
    }
};

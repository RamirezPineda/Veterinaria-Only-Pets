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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('fecha');
            $table->string('concepto', 100);
            $table->integer('total');
            $table->integer('id_cliente')->nullable();
            $table->integer('id_administrativo')->nullable();
            $table->foreign('id_administrativo')->references('id')->on('administrativos')->nullOnDelete()->onUpdate('cascade');
            $table->foreign('id_cliente')->references('id')->on('clientes')->nullOnDelete()->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};

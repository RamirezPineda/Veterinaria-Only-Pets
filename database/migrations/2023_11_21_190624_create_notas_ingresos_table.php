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
        Schema::create('notas_ingresos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('id_proveedor')->nullable();
            $table->integer('id_producto')->nullable();
            $table->integer('id_administrativo')->nullable();
            $table->integer('cantidad');
            $table->date('fecha');
            $table->time('hora');
            $table->integer('monto_total');
            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_administrativo')->references('id')->on('administrativos')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_ingresos');
    }
};

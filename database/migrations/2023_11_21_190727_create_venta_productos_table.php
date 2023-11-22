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
        Schema::create('venta_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_venta');
            $table->unsignedBigInteger('id_producto')->nullable();
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('monto');
            $table->foreign('id_venta')->references('id')->on('ventas');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_productos');
    }
};

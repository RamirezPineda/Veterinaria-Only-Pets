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
        Schema::create('productos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion', 200);
            $table->string('foto')->nullable();
            $table->integer('costo');
            $table->integer('precio')->nullable();
            $table->string('marca')->nullable();
            $table->integer('cantidad');
            $table->integer('id_categoria')->nullable();
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

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
        Schema::create('veterinarios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->foreign('id')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('profesion');
            $table->integer('id_servicio')->nullable();
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veterinarios');
    }
};

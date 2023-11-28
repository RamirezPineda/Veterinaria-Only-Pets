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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('nombre_usuario', '100');
            $table->string('password');
            $table->boolean('enable');
            $table->rememberToken();
            $table->integer('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

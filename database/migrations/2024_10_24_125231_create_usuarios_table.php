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
            $table->id('usuarioID')->primary();
            $table->string('nombre');
            $table->string('usuario')->unique();
            $table->string('contraseña');
            $table->string('rol_usuario');
            $table->foreignId('departamentoID')->constrained('departamentos', 'departamentoID');
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

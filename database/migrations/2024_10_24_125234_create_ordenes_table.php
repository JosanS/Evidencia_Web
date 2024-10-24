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
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('ordenID')->primary();
            $table->foreignId('clienteID')->constrained('clientes', 'clienteID');
            $table->foreignId('usuarioID')->constrained('usuarios', 'usuarioID');
            $table->string('numeroFactura');
            $table->string('estadoOrden');
            $table->datetime('fechaCreacion');
            $table->string('direccionEntrega');
            $table->text('notaAdicional')->nullable();
            $table->boolean('ordenEliminada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordenes');
    }
};

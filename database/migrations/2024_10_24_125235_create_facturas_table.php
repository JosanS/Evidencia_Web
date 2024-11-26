<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id('facturaID');
            $table->foreignId('ordenID')->
            constrained('ordenes', 'ordenID');
            $table->string('datosFiscales');
            $table->datetime('fechaCreacion');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};

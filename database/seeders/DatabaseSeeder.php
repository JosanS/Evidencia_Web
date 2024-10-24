<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Models\Orden;
use App\Models\Factura;
use App\Models\Foto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Departamento::factory()->count(4)->create();
        $departamentoIDs = Departamento::pluck('departamentoID')->toArray();
        foreach (range(1, 10) as $index) {
            Usuario::factory()->create([
                'departamentoID' => $departamentoIDs[array_rand($departamentoIDs)], // Randomly pick a departamentoID
            ]);
        }
        Cliente::factory()->count(10)->create();
        
        $clienteIDs = Cliente::pluck('clienteID')->toArray();
        $usuarioIDs = Usuario::pluck('usuarioID')->toArray();
        
        foreach (range(1, 20) as $id) {
            Orden::factory()->create([
                'ordenID' => $id,
                'clienteID' => $clienteIDs[array_rand($clienteIDs)],
                'usuarioID' => $usuarioIDs[array_rand($usuarioIDs)],
            ]);
        }

        Factura::factory()->count(20)->create();
        Foto::factory()->count(30)->create();
    }
}

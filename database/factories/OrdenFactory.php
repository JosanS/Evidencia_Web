<?php

namespace Database\Factories;

use App\Models\Orden;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdenFactory extends Factory
{
    protected $model = Orden::class;

    public function definition(): array
    {
        return [
            'clienteID' => Cliente::inRandomOrder()->first()->clienteID,
            'usuarioID' => Usuario::inRandomOrder()->first()->usuarioID,
            'numeroFactura' => $this->faker->unique()->numerify('F-#####'),
            'estadoOrden' => $this->faker->randomElement(['Ordenado', 'En Proceso', 'En Ruta', 'Entregado']),
            'fechaCreacion' => $this->faker->dateTime,
            'direccionEntrega' => $this->faker->address,
            'notaAdicional' => $this->faker->text(100),
            'ordenEliminada' => false,
        ];
    }
}

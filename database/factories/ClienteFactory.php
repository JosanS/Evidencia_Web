<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
   protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company,
            'direccion' => $this->faker->address,
            'correoElectronico' => $this->faker->unique()->safeEmail,
            'numeroTelefono' => $this->faker->phoneNumber,
            'datosFiscales' => $this->faker->text(50),
        ];
    }
}

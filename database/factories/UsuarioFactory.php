<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Departamento;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        $departamentos = Departamento::all();
        $randomDepartamento = $departamentos->random();

        return [
            'nombre' => $this->faker->name,
            'usuario' => $this->faker->unique()->userName,
            'contraseña' => Hash::make('password'),
            'rol_usuario' => $this->faker->randomElement(['Ventas', 'Comprador', 'Almacen', 'Repartidor']),
            'departamentoID' => $randomDepartamento->departamentoID,
        ];
    }
}

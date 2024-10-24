<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\Orden;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    protected $model = Factura::class;

    public function definition(): array
    {
        return [
            'ordenID' => Orden::inRandomOrder()->first()->ordenID,
            'datosFiscales' => $this->faker->text(50),
            'fechaCreacion' => $this->faker->dateTime,
        ];
    }
}

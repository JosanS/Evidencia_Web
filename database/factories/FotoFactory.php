<?php

namespace Database\Factories;

use App\Models\Foto;
use App\Models\Orden;
use Illuminate\Database\Eloquent\Factories\Factory;

class FotoFactory extends Factory
{
    protected $model = Foto::class;

    public function definition(): array
    {
        return [
            'ordenID' => Orden::inRandomOrder()->first()->ordenID,
            'rutaImagen' => $this->faker->imageUrl(640, 480, 'construction'),
            'fechaCreacion' => $this->faker->dateTime,
        ];
    }
}

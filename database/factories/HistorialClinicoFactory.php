<?php

namespace Database\Factories;

use App\Models\ClienteMascota;
use App\Models\HistorialClinico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HistorialClinico>
 */
class HistorialClinicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = HistorialClinico::class;
    public function definition(): array
    {
        

        return [
            'id_mascota' => function () {
                return ClienteMascota::factory()->create()->id_mascota;
            },
            'peso' => $this->faker->randomFloat(3, 10, 20),
            'talla' => $this->faker->randomElement(['5', '6', '7','8']),
        ];
    }
}

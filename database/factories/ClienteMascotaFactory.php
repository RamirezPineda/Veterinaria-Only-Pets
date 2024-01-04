<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\ClienteMascota;
use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClienteMascota>
 */
class ClienteMascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ClienteMascota::class;
    public function definition(): array
    {
        
        return [
            'id_cliente' => function () {
                return Cliente::factory()->create()->id;
            },
            'id_mascota'  => function () {
                return Mascota::factory()->create()->id;
            },
            'fecha_registro' => $this->faker->date(),
        ];
   
    }
}

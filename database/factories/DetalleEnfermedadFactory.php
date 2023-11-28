<?php

namespace Database\Factories;

use App\Models\DetalleEnfermedad;
use App\Models\Enfermedad;
use App\Models\HistorialClinico;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleEnfermedad>
 */
class DetalleEnfermedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = DetalleEnfermedad::class;
    public function definition(): array
    {
        
        return [
            'id_enfermedad' => Enfermedad::all()->random()->id,
            'id_historial'  => function () {
                return HistorialClinico::factory()->create()->id;
            },
            'fecha_deteccion' => $this->faker->date,
            'inicio_tratamiento' => $this->faker->date,
            'fin_tratamiento' => $this->faker->date,
        ];
           
    }
}

<?php

namespace Database\Factories;

use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mascota::class;
    public function definition(): array
    {
        $razasPerros = [
            'Labrador Retriever',
            'Pitbull',
            'Bulldog', 'Boxer', 'Doberman', 'Husky', 'Mastil',
            'Golden Retriever', 'Poodle', 'Beagle',
            'Dachshund', 'Chihuahua', 'Pug', 'Caniche', 'Pastror Aleman',
            'Rottweiler', 'Bull Terrier', 'Yorkshire Terrier', 'San Bernardo',
             'Gran Danes', 'Pomerania', 'Pequinés','Pinscher', 'Pointer',
        ];

       
        return [
            'nombre' => $this->faker->unique()->word,
            'raza' => $this->faker->randomElement($razasPerros),
            'fecha_nacimiento' => $this->faker->date,
            'especie' => "perro",
            'descripcion' => $this->faker->sentence,
            'sexo' => $this->faker->randomElement(['Macho', 'Hembra']),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Persona::class;
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName,
            'apellido_paterno' => $this->faker->lastName,
            'apellido_materno' => $this->faker->lastName,
            'ci' => $this->faker->numerify('########'), // generará un número aleatorio de 8 dígitos
            'direccion' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'fecha_de_nacimiento' => $this->faker->date('Y-m-d', '1989-12-25'),
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'telefono' => $this->faker->numerify('7#######'),
        ];
    }
}

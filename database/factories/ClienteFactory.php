<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Cliente::class;
    public function definition()
    {
        static $idPersona = 16;

        return [
            'id' => $idPersona++,
            'contacto_emergencia' => $this->faker->numerify('7#######'), // generará un número aleatorio de 8 dígitos
        ];
    }
}

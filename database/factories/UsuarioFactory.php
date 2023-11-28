<?php

namespace Database\Factories;

use App\Models\Usuario;
use App\Models\Persona;
use Faker\Provider\ar_EG\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Usuario::class;
    public function definition()
    {
        static $idPersona = 16;
        $password = Hash::make('1234');

        return [
            'nombre_usuario' => Persona::find($idPersona)->email,
            'password' => bcrypt($password), // Asegúrate de generar una contraseña segura
            'enable' => '1',
            'id_persona' => $idPersona++,
        ];
    }
}

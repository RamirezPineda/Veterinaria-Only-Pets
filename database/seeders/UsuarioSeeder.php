<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1234');

        Usuario::create([
            'nombre_usuario' => 'torrez-juan@gmail.com', 
            'password' => $password, 
            'enable' => '1',
            'id_persona' => '1', 
        ])->assignRole('super-admin');

        Usuario::create([
            'nombre_usuario' => 'maria.molina@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '2', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'martines.sofia11@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '3', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'luisgg24@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '4', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'gomes-josue@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '5', 
        ])->assignRole('recepcionista');

        Usuario::create([
            'nombre_usuario' => 'andres_andres@gmail.com', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '6', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'garcia_luci@gmail.com', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '7', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'molinajhom@gmail.com', 
            'password' => $password, 
            'enable' => '1',  
            'id_persona' => '8', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'luis_gp@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '9', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'lopez_enriquee@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '10', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'burguoa-esquivel@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '11', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'guzman.pedraza@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '12', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'marcelo_perez24@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '13', 
        ])->assignRole('cliente');

        Usuario::create([
            'nombre_usuario' => 'felize.1514@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '14', 
        ])->assignRole('veterinario');

        Usuario::create([
            'nombre_usuario' => 'escobar_angela@gmail.com', 
            'password' => $password, 
            'enable' => '1', 
            'id_persona' => '15', 
        ])->assignRole('veterinario');
    }
}

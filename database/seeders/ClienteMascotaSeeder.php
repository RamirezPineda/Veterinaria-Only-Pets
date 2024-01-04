<?php

namespace Database\Seeders;

use App\Models\ClienteMascota;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteMascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClienteMascota::create([
            'id_cliente' => 8, 
            'id_mascota' => 1, 
            'fecha_registro' => '2023-03-15', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 8, 
            'id_mascota' => 2, 
            'fecha_registro' => '2023-04-10', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 9, 
            'id_mascota' => 3, 
            'fecha_registro' =>  '2023-04-30', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 10, 
            'id_mascota' => 4, 
            'fecha_registro' =>  '2023-03-10', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 11, 
            'id_mascota' => 5, 
            'fecha_registro' =>  '2023-03-11', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 11, 
            'id_mascota' => 6, 
            'fecha_registro' => '2023-03-12', 
        ]);
        ClienteMascota::create([
            'id_cliente' => 12, 
            'id_mascota' => 7,
            'fecha_registro' => '2023-03-13', 
        ]);
    }
}

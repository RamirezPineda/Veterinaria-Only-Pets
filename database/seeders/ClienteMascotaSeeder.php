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
            'id_cliente' => '8', 
            'id_mascota' => '1', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '8', 
            'id_mascota' => '2', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '9', 
            'id_mascota' => '3', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '10', 
            'id_mascota' => '4', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '11', 
            'id_mascota' => '5', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '11', 
            'id_mascota' => '6', 
        ]);
        ClienteMascota::create([
            'id_cliente' => '12', 
            'id_mascota' => '7', 
        ]);
    }
}

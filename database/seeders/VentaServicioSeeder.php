<?php

namespace Database\Seeders;

use App\Models\VentaServicio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //para cirugias
        VentaServicio::create([
            'id_servicio' => '5', 
            'id_venta' => '1', 
            'id_mascota' => '1',
        ]);
        VentaServicio::create([ 
            'id_servicio' => '5', 
            'id_venta' => '2', 
            'id_mascota' => '1',
        ]);
        VentaServicio::create([
            'id_servicio' => '5', 
            'id_venta' => '3', 
            'id_mascota' => '1',
        ]);

        VentaServicio::create([
            'id_servicio' => '5', 
            'id_venta' => '4', 
            'id_mascota' => '2',
        ]);
        VentaServicio::create([
            'id_servicio' => '2', 
            'id_venta' => '5', 
            'id_mascota' => '2',
        ]);
        VentaServicio::create([
            'id_servicio' => '2', 
            'id_venta' => '6', 
            'id_mascota' => '2',
        ]);
        VentaServicio::create([
            'id_servicio' => '2', 
            'id_venta' => '7', 
            'id_mascota' => '2',
        ]);


        //para vacunas
        VentaServicio::create([
            'id_servicio' => '1', 
            'id_venta' => '8', 
            'id_mascota' => '3',
        ]);
        VentaServicio::create([
            'id_servicio' => '1', 
            'id_venta' => '9', 
            'id_mascota' => '3',
        ]);


        VentaServicio::create([
            'id_servicio' => '1', 
            'id_venta' => '10', 
            'id_mascota' => '4',
        ]);
        VentaServicio::create([
            'id_servicio' => '1', 
            'id_venta' => '11', 
            'id_mascota' => '4',
        ]);


        VentaServicio::create([
            'id_servicio' => '1', 
            'id_venta' => '12', 
            'id_mascota' => '5',
        ]);

      

    }
}

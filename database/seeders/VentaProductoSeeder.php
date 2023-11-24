<?php

namespace Database\Seeders;

use App\Models\VentaProducto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VentaProducto::create([
            'id_venta' => '13', 
            'id_producto' => '15', 
            'cantidad' => '1', 
            'monto' => '120', 
        ]);
        VentaProducto::create([
            'id_venta' => '14', 
            'id_producto' => '15', 
            'cantidad' => '1', 
            'monto' => '120', 
        ]);
        VentaProducto::create([
            'id_venta' => '15', 
            'id_producto' => '14', 
            'cantidad' => '1', 
            'monto' => '1000', 
        ]);
        VentaProducto::create([
            'id_venta' => '16', 
            'id_producto' => '1', 
            'cantidad' => '1', 
            'monto' => '40', 
        ]);
        VentaProducto::create([
            'id_venta' => '16', 
            'id_producto' => '2', 
            'cantidad' => '1', 
            'monto' => '50', 
        ]);
        VentaProducto::create([
            'id_venta' => '16', 
            'id_producto' => '3', 
            'cantidad' => '1', 
            'monto' => '70', 
        ]);

    }
}

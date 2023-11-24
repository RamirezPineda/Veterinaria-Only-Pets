<?php

namespace Database\Seeders;

use App\Models\Venta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Venta de servicio  
        Venta::create([
            'fecha' => '2022-03-15', 
            'concepto' => 'servicio', 
            'total' => '1000', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 

        ]);
        Venta::create([
            'fecha' => '2022-04-10', 
            'concepto' => 'servicio', 
            'total' => '1000', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 

        ]);
        Venta::create([
            'fecha' => '2022-04-30', 
            'concepto' => 'servicio', 
            'total' => '1000', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 

        ]);


        //recibos de servicio con plan de pago
        Venta::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'servicio', 
            'total' => '250', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 

        ]);
        Venta::create([
            'fecha' => '2022-03-11', 
            'concepto' => 'servicio', 
            'total' => '250', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 

        ]);
        Venta::create([
            'fecha' => '2022-03-12', 
            'concepto' => 'servicio', 
            'total' => '250', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8',

        ]);
        Venta::create([
            'fecha' => '2022-03-13', 
            'concepto' => 'servicio', 
            'total' => '250', 
            'id_administrativo'=> '4',
            'id_cliente'=>'8', 
        ]);

        //Venta de vacunas
        Venta::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'servicio', 
            'total' => '20', 
            'id_administrativo'=> '3',
            'id_cliente'=>'9',
        ]);
        Venta::create([
            'fecha' => '2022-03-20', 
            'concepto' => 'servicio', 
            'total' => '20', 
            'id_administrativo'=> '3',
            'id_cliente'=>'9',
        ]);


        Venta::create([
            'fecha' => '2022-03-20', 
            'concepto' => 'servicio', 
            'total' => '20', 
            'id_administrativo'=> '3',
            'id_cliente'=>'10',
        ]);
        Venta::create([
            'fecha' => '2022-03-30', 
            'concepto' => 'servicio', 
            'total' => '20', 
            'id_administrativo'=> '5', 
            'id_cliente'=>'10',
        ]);
        

        Venta::create([
            'fecha' => '2022-03-10', 
            'concepto' => 'servicio', 
            'total' => '20', 
            'id_administrativo'=> '3',
            'id_cliente'=>'11',
        ]);

        
        //Venta de productos vendidos
        Venta::create([
            'fecha' => '2022-05-01', 
            'concepto' => 'producto', 
            'total' => '120', 
            'id_administrativo'=> '3',
            'id_cliente'=>'9',
        ]);
        Venta::create([
            'fecha' => '2022-05-01', 
            'concepto' => 'producto', 
            'total' => '120', 
            'id_administrativo'=> '3',
            'id_cliente'=>'9',
        ]);


        Venta::create([
            'fecha' => '2022-05-02', 
            'concepto' => 'producto', 
            'total' => '1000', 
            'id_administrativo'=> '4',
            'id_cliente'=>'10', 
        ]);
        Venta::create([
            'fecha' => '2022-05-04', 
            'concepto' => 'producto', 
            'total' => '160', 
            'id_administrativo'=> '4',
            'id_cliente'=>'10', 
        ]);
    }
}

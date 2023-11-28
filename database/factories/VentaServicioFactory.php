<?php

namespace Database\Factories;

use App\Models\ClienteMascota;
use App\Models\Mascota;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VentaServicio;
use App\Models\Servicio;
use App\Models\Venta;
use Illuminate\Support\Facades\Log;

class VentaServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = VentaServicio::class;
    public function definition()
    {
        
        $venta = Venta::ventaSinServicios();
        //Log::info($ventasSinProducto);
        if(is_null($venta)){
            $venta = Venta::where('id', '>', '16' )->where('concepto', 'servicio' )->inRandomOrder()->first();
        }
        $cantidadServicios = Servicio::count();

        $idServicio= $this->faker->numberBetween(1,  $cantidadServicios);
        $precioServicio=  Servicio::find($idServicio)->precio;

        $venta->total += $precioServicio;
        $venta->save();
        $idMascota = ClienteMascota::where('id_cliente', $venta->id_cliente)->inRandomOrder()->first()->id_mascota;
        /* Log::info($idMascota); */
        return [
        'id_venta' => $venta->id,  
        'id_servicio' =>  $idServicio,
        'id_mascota' => $idMascota,
        ];
        
    }
}

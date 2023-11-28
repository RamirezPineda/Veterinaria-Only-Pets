<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\VentaProducto;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class VentaProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = VentaProducto::class;
    public function definition()
    {
        $venta = Venta::ventaSinProductos();
        //Log::info($ventasSinProducto);
        if(is_null($venta)){
            $venta = Venta::where('id', '>', '16' )->where('concepto', 'producto' )->inRandomOrder()->first();
        }
        
        $cantidadProductos = Producto::count();
        $idProducto = $this->faker->numberBetween(1,  $cantidadProductos);
        $cantidad = $this->faker->numberBetween(1, 5);
        $precioProducto =  Producto::find($idProducto)->precio;
        $precioTotal = $cantidad * $precioProducto; 

        $venta->total += $precioTotal;
        $venta->save();

        return [
        'id_venta' => $venta->id,
        'id_producto' =>  $idProducto,
        'cantidad' => $cantidad,
        'monto' => $precioTotal,
        ];
    }
}

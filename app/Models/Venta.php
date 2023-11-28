<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'ventas';
    protected $fillable  = [ 
        'fecha', 
        'concepto', 
        'total',
        'id_administrativo',
        'id_cliente',
    ];

    public static function ventaSinProductos()
    {
        return Venta::where('total', '=', '0')
        ->where('concepto', 'producto')
        ->first();
    }

    public static function ventaSinServicios()
    {
        return Venta::where('total', '=', '0')
        ->where('concepto', 'servicio')
        ->first();
    }
    

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;
    protected $table = 'venta_productos';
    protected $fillable  = [ 
        'id_venta', 
        'id_producto', 
        'cantidad', 
        'monto', 
    ];
}

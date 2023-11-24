<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaServicio extends Model
{
    use HasFactory;
    protected $table = 'venta_servicios';
    protected $fillable  = [ 
        'id_venta', 
        'id_servicio', 
        'id_mascota'
    ];
}

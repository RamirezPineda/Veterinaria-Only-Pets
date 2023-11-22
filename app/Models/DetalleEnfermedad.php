<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEnfermedad extends Model
{
    use HasFactory;

    protected $table = 'detalles_enfermedades';

    protected $fillable  = [ 
        'id_enfermedad',
        'id_historial',
        'fecha_deteccion', 
        'inicio_tratamiento',
        'fin_tratamiento',
    ];
}

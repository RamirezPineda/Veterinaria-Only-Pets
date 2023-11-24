<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteMascota extends Model
{
    use HasFactory;
    protected $table = 'clientes_mascotas';
    protected $fillable  = [ 
        'id_cliente', 
        'id_mascota', 
        
    ];
}

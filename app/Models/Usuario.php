<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Authenticatable 
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre_usuario',
        'password',
        'enable',
        'id_persona',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}


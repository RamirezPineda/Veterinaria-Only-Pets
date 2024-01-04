<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = ['id', 'contacto_emergencia'];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }

    public function mascotas()
    {
        return $this->belongsToMany(Mascota::class, 'clientes_mascotas', 'id_cliente', 'id_mascota');
    }
}


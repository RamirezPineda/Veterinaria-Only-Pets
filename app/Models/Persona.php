<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'ci',
        'direccion',
        'email',
        'fecha_de_nacimiento',
        'sexo',
    ];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_persona');
    }

    public function administrativo()
    {
        return $this->hasOne(Administrativo::class, 'id');
    }
}

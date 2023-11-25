<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaServicio extends Model
{
    use HasFactory;
    protected $table = 'venta_servicios';

    protected $fillable  = [
        'id_servicio',
        'id_venta',
        'id_mascota',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }

    public function mascota()
    {
        return $this->belongsTo(Mascota::class, 'id_mascota');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrativo extends Model
{
    use HasFactory;

    protected $table = 'administrativos';

    protected $fillable = ['id', 'profesion'];


    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id');
    }
}

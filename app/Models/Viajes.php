<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viajes extends Model
{

    use HasFactory;
    protected $fillable = [
        'fecha_inicio',
        'fecha_final',
        'transporte_id',
        'estado_viaje_id',
        'usuario_id',
        'ciudad_salida_id',
        'ciudad_destino_id',
        'recomendado',
    ];
}

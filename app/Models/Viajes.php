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
        'estados_viajes_id',
        'usuario_id',
        'ciudad_salida_id',
        'ciudad_destino_id',
        'recomendado',
    ];
    public $timestamps = false;
    public function usuarioId()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

    public function transporteId()
    {
        return $this->belongsTo(Transportes::class, 'transporte_id');
    }
    public function ciudadSalidaId()
    {
        return $this->belongsTo(Ciudades::class, 'ciudad_salida_id');
    }
    public function ciudadDestinoId()
    {
        return $this->belongsTo(Ciudades::class, 'ciudad_destino_id');
    }

    public function estadoViajeId(){
        return $this->belongsTo(Estados_viaje::class,'estados_viajes_id');
    }
}

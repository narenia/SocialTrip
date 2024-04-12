<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valoraciones extends Model
{
    use HasFactory;
    protected $fillable = ['puntuacion', 'valoracion', 'viaje_id'];

    public function viajeId()
    {
        return $this->belongsTo(Viajes::class, 'viaje_id');
    }
}

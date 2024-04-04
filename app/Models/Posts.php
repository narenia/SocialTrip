<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'contenido', 'usuario_id', 'viajes_id'];

    public function viajeId()
    {
        return $this->belongsTo(Viajes::class, 'viajes_id');
    }

    public function usuarioId()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }

}

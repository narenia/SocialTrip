<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'estado', 'fecha', 'contenido', 'usuario_id'];

    public function usuarioId()
{
    return $this->belongsTo(Usuarios::class, 'usuario_id');
}
}

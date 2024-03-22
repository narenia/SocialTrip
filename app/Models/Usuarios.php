<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'contrasenna',
        'tipo',
        'fecha_nacimiento',
        'nombre',
        'apellidos',
        'nombre_usuario',
        'dni',
        'ciudad_residencia',
        'ciudad_nacimiento',
    ];
}

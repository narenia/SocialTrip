<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//SPATIE
use Spatie\Permission\Traits\HasRoles;
class Usuarios extends Model
{
    use HasFactory, HasRoles;
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

    public function ciudadResidencia()
{
    return $this->belongsTo(Ciudades::class, 'ciudad_residencia');
}

public function ciudadNacimiento()
{
    return $this->belongsTo(Ciudades::class, 'ciudad_nacimiento');
}
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
//SPATIE
use Spatie\Permission\Traits\HasRoles;

class Usuarios extends Model implements Authenticatable
{
    use HasFactory, HasRoles, Notifiable;
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
        'remember_token'
    ];

    public function ciudadResidencia()
    {
        return $this->belongsTo(Ciudades::class, 'ciudad_residencia');
    }

    public function ciudadNacimiento()
    {
        return $this->belongsTo(Ciudades::class, 'ciudad_nacimiento');
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->contrasenna;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class valoraciones extends Model
{
    use HasFactory;
    protected $fillable = ['puntuacion', 'valoracion', 'viaje_id'];
}

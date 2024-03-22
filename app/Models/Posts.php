<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [ 'titulo', 'contenido', 'usuario_id', 'viajes_id'];
}

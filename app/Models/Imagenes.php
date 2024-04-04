<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Imagenes extends Model
{
    use HasFactory;
    protected $fillable = ['ruta', 'album_id', 'posts_id', 'viajes_id'];

    public function albumId()
    {
        return $this->belongsTo(Albumes::class, 'album_id');
    }

    public function postId()
    {
        return $this->belongsTo(Posts::class, 'posts_id');
    }
    public function viajeId()
    {
        return $this->belongsTo(Viajes::class, 'viajes_id');
    }
}

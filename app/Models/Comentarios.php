<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    protected $fillable = ['contenido','post_id', 'usuarios_id'];

    public function postId()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }

    public function usuarioId()
    {
        return $this->belongsTo(Usuarios::class, 'usuarios_id');
    }

}

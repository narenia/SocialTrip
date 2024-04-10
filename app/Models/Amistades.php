<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;

class Amistades extends Model
{
    use HasFactory;
    protected $fillable = ['usuario1_id', 'usuario2_id', 'estado'];

    public function usuario1Id()
    {
        return $this->belongsTo(Usuarios::class, 'usuario1_id');
    }
    public function usuario2Id()
    {
        return $this->belongsTo(Usuarios::class, 'usuario2_id');
    }
}

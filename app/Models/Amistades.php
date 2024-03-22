<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amistades extends Model
{
    use HasFactory;
    protected $fillable = ['usuario1_id', 'usuario2_id', 'estado'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportes extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public $timestamps = false;
}

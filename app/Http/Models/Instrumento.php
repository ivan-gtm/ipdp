<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table = 'c_instrumento';
    
    // protected $fillable = ['descripcion'];

    use HasFactory;
}
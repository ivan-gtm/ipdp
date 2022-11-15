<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionAnalisisSubtemas extends Model
{
    protected $table = 'c_evaluacion_analisis_subtemas';
    
    protected $fillable = ['fk_tema','descripcion'];

    use HasFactory;
}
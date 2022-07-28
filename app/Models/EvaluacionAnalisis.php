<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionAnalisis extends Model
{
    protected $table = 'evaluacion_analisis';
    
    protected $fillable = ['consulta_fk','motivo_rechazo'];

    use HasFactory;
}
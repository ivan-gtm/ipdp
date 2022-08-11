<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionAnalisis extends Model
{
    protected $table = 'evaluacion_analisis';
    
    protected $fillable = ['consulta_fk','tipo_documento','motivo_rechazo','tema_fk','subtema_fk'];

    use HasFactory;
}
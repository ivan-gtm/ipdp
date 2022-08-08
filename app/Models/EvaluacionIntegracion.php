<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionIntegracion extends Model
{
    protected $table = 'evualuacion_integracion';
    
    protected $fillable = [
        'consulta_fk',
        'evaluador_pgot_fk',
        'evaluador_pgd_fk',
        'eje_estrategia',
        'accion_objetivo'
    ];
    
    use HasFactory;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionIntegracion extends Model
{
    protected $table = 'evualuacion_integracion';
    
    protected $fillable = [
        'consulta_fk',
        'tipo_documento',
        'evaluador_pgot_fk',
        'evaluador_pgd_fk',
        'pgd_eje_estrategia',
        'pgd_accion_objetivo',
        'pgot_eje_estrategia',
        'pgot_accion_objetivo'
    ];
    
    use HasFactory;
}
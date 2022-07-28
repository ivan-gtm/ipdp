<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionTecnicaRechazo extends Model
{
    protected $table = 'evualuacion_tecnica_rechazo';
    
    protected $fillable = ['consulta_fk','motivo_rechazo'];

    use HasFactory;
}
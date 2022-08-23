<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionJuridica extends Model
{
    protected $table = 'evualuacion_juridica';
    
    protected $fillable = ['consulta_fk','tipo_documento','observaciones','motivo_rechazo'];

    use HasFactory;
}
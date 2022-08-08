<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluacionTecnica extends Model
{
    protected $table = 'evualuacion_tecnica';
    
    protected $fillable = ['consulta_fk','instrumento_fk','observacion'];

    use HasFactory;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluacionJuridica extends Model
{
    protected $table = 'evualuacion_juridica';
    
    protected $fillable = ['consulta_fk','motivo_rechazo'];

    use HasFactory;
}
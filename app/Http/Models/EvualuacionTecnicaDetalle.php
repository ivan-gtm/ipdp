<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvualuacionTecnicaDetalle extends Model
{
    protected $table = 'evualuacion_tecnica_detalle';
    
    protected $fillable = ['evualuacion_tecnica_fk','categoria_fk','apartado_fk'];

    use HasFactory;
}
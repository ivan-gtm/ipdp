<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cedula extends Model
{
    protected $fillable = [
        'origen',
        'folio',
        'status',
        'nombre',
        'primer_apellido',
        'segundo_apellido',
        'edad',
        'ocupacion',
        'genero',
        'correo',
        'celular',
        'calle',
        'num_exterior',
        'num_interior',
        'manzana',
        'cp',
        'alcaldia',
        'colonia',
        'representante',
        'instrumento_observar',
        'comentarios',
        'incluye_documentos',
        'numero_documentos',
        'conocimiento_datos_personales',
    ];
    use HasFactory;
}

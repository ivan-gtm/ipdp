<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormatoInterno extends Model
{
    protected $table = 'consulta_indigena';
    protected $fillable = [
        'folio',
        'status',
        'tipoConsulta',
        'fechaSolicitud',
        'nombreCompleto',
        'correo',
        'telefono',
        'tieneDatosParticipante',
        'esRepresentante',
        'tipoAutoridad',
        'nombrePuebloComunidad',
        'tipoOrganizacion',
        'nombreOrganizacion',
        'nombre',
        'primerApellido',
        'segundoApellido',
        'edad',
        'ocupacion',
        'genero',
        'celular',
        'calle',
        'numExterior',
        'numInterior',
        'manzana',
        'cp',
        'alcaldia',
        'colonia',
        'tipoParticipacion',
        'participacionOtro',
        'nombreActividad',
        'fechaActividad',
        'lugarActividad',
        'numeroDocumentos',
        'tipoDocumentos'
    ];

    use HasFactory;
}

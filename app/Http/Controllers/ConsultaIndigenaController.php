<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultaIndigena;
// use App\Models\Consulta;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ConsultaIndigenaController extends Controller
{
    
    function registrar(){
        $numero_folio = mt_rand(100000, 999999);

        return view('ipdp.consulta_indigena', [
            'numero_folio' => $numero_folio
        ]);
    }

    public function store(Request $request)
    {

        // 'folio' => 'required|digits:6',
        // 'edad' => 'required|min:1|max:99',
        // 'genero' => ['required',Rule::in(['Hombre', 'Mujer','Otro'])],
        // 'correo' => 'required|email|unique:cedulas',
        // 'celular' => 'required|digits:10',
        // 'numero_documentos' => 'required|numeric|min:1|max:99',
        // 'conocimiento_datos_personales' => ['required',Rule::in(['si','no'])],
        
        
        $validatedData = $request->validate([
            'folio' => 'required',
            'tipoConsulta' => ['required',Rule::in([
                "CONSULTA INDÍGENA",
                "CONSULTA PUBLICA",
                "INDIVIDUAL",
                "ENLACE"
            ])],
            'fechaSolicitud' => 'date_format:"Y-m-d"|required',
            'nombreCompleto' => 'required',
            'correo' => 'required',
            // 'correo' => 'required|email|unique:cedulas',
            'telefono' => 'required|digits:10',
            'tieneDatosParticipante' => ['required',Rule::in(['si','no'])],
            'esRepresentante' => ['required',Rule::in(['si','no'])],
            'tipoAutoridad' => 'required',
            'nombrePuebloComunidad' => 'required',
            'tipoOrganizacion' => 'required',
            'nombreOrganizacion' => 'required',
            'nombre' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'edad' => 'required',
            'ocupacion' => 'required',
            'optionGenero' => 'required',
            'celular' => 'required',
            'calle' => 'required',
            'numExterior' => 'required',
            'numInterior' => 'required',
            'manzana' => 'required',
            'cp' => 'required',
            'alcaldia' => 'required',
            'colonia' => 'required',
            'tipoParticipacion' => 'required',
            // 'participacionOtro' => 'required',
            // 'nombreActividad' => 'required',
            // 'fechaActividad' => 'required',
            // 'lugarActividad' => 'required',
            // 'numeroDocumentos' => 'required'
        ]);

        // print_r($validatedData);
        // exit;

        $show = ConsultaIndigena::create($validatedData);
        return response()->json([]);

    }
}

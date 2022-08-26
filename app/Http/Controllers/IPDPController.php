<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IPDPController extends Controller
{
    function index(){
        return view('ipdp.home', []);
    }

    function recuperaContrasena(){
        return view('ipdp.recupera_contrasena', []);
    }
    
    public function buscar($folio){
        $cedula = null;
        
        // Valida que folio se componga de 6 digitos
        if( preg_match("/^[\w\d]{6}$/",$folio) == false){
            abort(404);
        }

        $numero_cedulas = DB::table('cedulas')->where('folio','=',$folio)->count();
        $numero_formato_interno = DB::table('consulta_indigena')->where('folio','=',$folio)->count();
        
        // $numero_formato = DB::table('cedulas')->where('folio',$numero_folio)->count();
        if( $numero_cedulas > 0){
            $cedula = DB::table('cedulas')->where('folio','=',$folio)->first();
            $tipo_documento = 'consulta-publica';
        } elseif( $numero_formato_interno > 0 ){
            $cedula = DB::table('consulta_indigena')->where('folio','=',$folio)->first();
            $tipo_documento = 'consulta-indigena';
        }

        $archivos = DB::table('cedula_archivo')
                        ->where('folio','=',$folio)
                        ->where('tipo_consulta','=',$tipo_documento)
                        ->get();

        if($cedula != null){
            return view('ipdp.seguimiento_folios', [
                'numero_folio' => $cedula->folio,
                'cedula' => $cedula,
                'archivos' => $archivos
            ]);
        } else {
            abort(404);
        }
    }

    function buscarFolio(){
        return view('ipdp.buscar_folio', []);
    }
}

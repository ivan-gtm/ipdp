<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Cedula;
use App\Models\FormatoInterno;

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
        } else {
            abort(404);
        }

        $instrumento = null;
        
        if( $cedula->status >= 100 ){
            $instrumento = self::obtenerInstrumento( $folio, $tipo_documento );
        }

        $archivos = DB::table('cedula_archivo')
                        ->where('folio','=',$folio)
                        ->where('tipo_consulta','=',$tipo_documento)
                        ->get();
        
        if($cedula != null && $tipo_documento == 'consulta-publica'){
            return view('ipdp.seguimiento_folios', [
                'numero_folio' => $cedula->folio,
                'cedula' => $cedula,
                'instrumento' => $instrumento,
                'archivos' => $archivos
            ]);
        }elseif($cedula != null && $tipo_documento == 'consulta-indigena'){
            return view('ipdp.seguimiento_formato_interno', [
                'numero_folio' => $cedula->folio,
                'cedula' => $cedula,
                'instrumento' => $instrumento,
                'archivos' => $archivos
            ]);
        } else {
            abort(404);
        }
    }

    function obtenerInstrumento( $folio, $tipo_documento ){
        
        $instrumento = null;
        
        if($tipo_documento == 'consulta-publica'){
            $instrumento = Cedula::join('evualuacion_tecnica', 'evualuacion_tecnica.consulta_fk', '=', 'cedulas.id')
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->selectRaw("cedulas.id cedula_id")
            ->selectRaw("c_instrumento.descripcion")
            ->where('cedulas.folio', $folio)
            ->first();    
        }elseif($tipo_documento == 'consulta-indigena'){
            $instrumento = FormatoInterno::join('evualuacion_tecnica', 'evualuacion_tecnica.consulta_fk', '=', 'consulta_indigena.id')
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->selectRaw("consulta_indigena.id cedula_id")
            ->selectRaw("c_instrumento.descripcion")
            ->where('consulta_indigena.folio', $folio)
            ->first();
        }
        
        
        
        
        return $instrumento;
        print_r( $instrumento );
        exit;
    }

    function buscarFolio(){
        return view('ipdp.buscar_folio', []);
    }
}

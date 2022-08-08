<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\Cedula;
use App\Models\User;
use App\Models\EvaluacionTecnica;
use App\Models\Instrumento;
use App\Models\EvaluacionAnalisisSubtemas;
use App\Models\EvualuacionTecnicaDetalle;
use App\Models\EvaluacionAnalisis;
use App\Models\EvaluacionTecnicaRechazo;
use App\Models\EvaluacionJuridica;
use App\Models\EvaluacionAnalisisTemas;

class AdministracionController extends Controller
{
    function home(){
        return view('ipdp.admin_home');
    }

    function evaluacionTecnica(){
        
        if( Auth::check() && ( Auth::user()->rol != 'tecnica' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }
        
        $perPage = 10;
        $cedulas = Cedula::whereIn('status', [2, 102])->orderByDesc('id')->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round( $total / $perPage );

        $parametros = self::obtenerParametrosValoracionTecnica();
        $instrumentos = self::obtenerCatalogoInstrumentos();
        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_evaluacion_tecnica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'instrumentos' => $instrumentos
        ]);
    }
    
    function evaluacionJuridica(){
        
        if( Auth::check() && ( Auth::user()->rol != 'juridica' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $perPage = 10;
        $cedulas = Cedula::whereIn('status', [3, 103])->orderByDesc('id')->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();
        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_evaluacion_juridica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros
        ]);
    }
    
    function evaluacionIntegracion(){
        
        if( Auth::check() && ( ( Auth::user()->rol != 'integracion_pgot' || Auth::user()->rol != 'integracion_pgd' ) && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $rol_usuario = Auth::user()->rol;
        $tipos_de_instrumentos_visibles = ['PGD+PGOT'];
        
        if( $rol_usuario == 'administracion'){
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
        } elseif( $rol_usuario == 'integracion_pgd'){
            array_push($tipos_de_instrumentos_visibles, 'PGD');
        } elseif( $rol_usuario == 'integracion_pgot'){
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
        }

        $perPage = 10;
        $cedulas = DB::table('cedulas')
            ->join('evualuacion_tecnica', 'cedulas.id', '=', 'evualuacion_tecnica.consulta_fk')
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id','cedulas.folio', 'cedulas.created_at','cedulas.status', 'cedulas.nombre','cedulas.primer_apellido','cedulas.segundo_apellido','c_instrumento.descripcion as instrumento')
            ->whereIn('cedulas.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->orderByDesc('cedulas.id')
            ->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        return view('ipdp.admin_evaluacion_integracion', [
            'page_number' => $page_number,
            'cedulas' => $cedulas
        ]);
    }
    
    function obtenerEvaluacionJuridica( $consulta_id = null){
        
        $query = '
        SELECT
            ec.id categoria_id,
            ec.descripcion categoria_descripcion,
            ae.id parametro_id,
            ae.descripcion parametro_descripcion 
        FROM
            evualuacion_tecnica et
            LEFT JOIN evualuacion_tecnica_detalle ed ON et.id = ed.evualuacion_tecnica_fk
            LEFT JOIN c_categoria_evaluacion_tecnica ec ON ed.categoria_fk = ec.id
            LEFT JOIN c_apartados_evaluacion_tecnica ae ON ed.apartado_fk = ae.id
        WHERE et.consulta_fk ='.$consulta_id;
        
        $parametros = [];
        $tmp = [];
        $evaluacion_parametros = [];
        $tmp['categoria']['id'] = "";
        $tmp['categoria']['descripcion'] = "";

        $evaluacion_parametros_query_bd = DB::select( DB::raw($query) );
        
        foreach ($evaluacion_parametros_query_bd as $parametro) {
            
            if( $tmp['categoria']['id'] != $parametro->categoria_id){
                $evaluacion_parametros[] = $tmp;
                $tmp = [];
                $tmp['categoria']['id'] = ucwords($parametro->categoria_id);
                $tmp['categoria']['descripcion'] = ucwords($parametro->categoria_descripcion);
            }
            $tmpx['id'] = ucwords($parametro->parametro_id);
            $tmpx['descripcion'] = ucwords($parametro->parametro_descripcion);
            $tmp['parametros'][] = $tmpx;

        }

        $evaluacion_parametros[] = $tmp;
        unset($evaluacion_parametros[0]);

        // $evaluacion_parametros
        $evaluacion_tecnica = EvaluacionTecnica::where('consulta_fk', $consulta_id)->first();

        $response = [
            'parametros' => $evaluacion_parametros,
            'comentario' => $evaluacion_tecnica->observacion
        ];
        
        // echo "<pre>";
        // print_r( $evaluacion_parametros );
        // exit;

        return response()->json($response);
    }

    function evaluacionAnalisis(){
        
        if( Auth::check() && ( Auth::user()->rol != 'analisis' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        
        $perPage = 10;
        $cedulas = Cedula::whereIn('status', [1, 101])->orderByDesc('id')->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round( $total / $perPage );
        
        $temas = EvaluacionAnalisisTemas::get()->toArray();
        $parametros = self::obtenerParametrosValoracionTecnica();

        // echo "<pre>";
        // print_r( $temas );
        // exit;
        
        return view('ipdp.admin_analisis', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros,
            'temas' => $temas
        ]);

    }
    
    function evaluacionRecepcion(){
        
        if( Auth::check() && ( Auth::user()->rol != 'recepcion' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'Usuario sin permisos para reproducir este modulo!');
        }

        $perPage = 10;
        $cedulas = Cedula::whereIn('status', [1, 101])->orderByDesc('id')->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();
        
        // admin_recepcion
        return view('ipdp.admin_recepcion', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros
        ]);

    }
    
    function detalleConsulta( $folio ){
        
        $cedula = DB::table('cedulas')->where('folio','=',$folio)->first();
        $archivos_cedula = DB::table('cedula_archivo')
                    ->where('tipo_consulta','=','consulta-publica')
                    ->where('folio','=',$folio)
                    ->get();

        $instrumento_observar = self::obtenerInstrumentosAObservar( $cedula->instrumento_observar );
        
        return view('ipdp.admin_detalle_consulta', [
            'cedula' => $cedula,
            'instrumento_observar' => $instrumento_observar,
            'archivos_cedula' => $archivos_cedula
        ]);

    }

    function obtenerInstrumentosAObservar( $instrumentos ){
        $arreglo_instrumentos = explode(',',$instrumentos);
        foreach ($arreglo_instrumentos as $anio_instrumento) {
            if( $anio_instrumento == '2020-2040' ){
                $instrumento_x['periodo'] = $anio_instrumento;
                $instrumento_x['descripcion'] = "PLAN GENERAL DE DESARROLLO DE LA CIUDAD DE MÉXICO";
            } elseif( $anio_instrumento == '2020-2035' ){
                $instrumento_x['periodo'] = $anio_instrumento;
                $instrumento_x['descripcion'] = "PROGRAMA GENERAL DE ORDENAMIENTO TERRITORIAL DE LA CIUDAD DE MÉXICO";
            }
            $respuesta[] = $instrumento_x;
        }

        return $respuesta;
    }

    function guardarEvaluacionAnalisis(Request $request){
        $consulta = Cedula::find($request->consulta_id);
        $consulta->status = 2;
        $consulta->save();
        
        $rechazo_analisis = EvaluacionAnalisis::create([
            'consulta_fk' => $request->consulta_id,
            'tema_fk' => $request->tema_evaluacion,
            'subtema_fk' => $request->subtema_evaluacion
        ]);

        return response()->json(["exito"]);
    }
    
    function obtenerSubtemasAnalisis( $tema_id = null ){
        $subtemas = EvaluacionAnalisisSubtemas::where('fk_tema', $tema_id)->get();
        return $subtemas->toJson(JSON_PRETTY_PRINT);
    }

    function guardarEvaluacionTecnica(Request $request){
        
        $evaluacion_tecnica = EvaluacionTecnica::create([
            'consulta_fk' => $request->folio_id,
            'instrumento_fk' => $request->instrumento,
            'observacion' => $request->observaciones
        ]);
        
        $evaluacion_parametros = $request->parametros;
        foreach ($evaluacion_parametros as $parametro) {
            list($categoria_id, $apartado_id) = explode("-",$parametro);
            
            EvualuacionTecnicaDetalle::create([
                'evualuacion_tecnica_fk' => $evaluacion_tecnica->id,
                'categoria_fk' => $categoria_id,
                'apartado_fk' => $apartado_id,
            ]);
        }
        
        $consulta = Cedula::find($request->folio_id);
        $consulta->status = 3; // Aprobado tecnicamente
        $consulta->save();

        return response()->json("exito");
    }
    
    function guardarRechazoAnalisisSolicitud(Request $request){

        $rechazo_analisis = EvaluacionAnalisis::create([
            'consulta_fk' => $request->consulta_id,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        $consulta = Cedula::find( $request->consulta_id );
        $consulta->status = 101;
        $consulta->save();
        
        return response()->json("exito");
    }
    
    function guardarRechazoEvaluacionTecnica(Request $request){

        $rechazo_analisis = EvaluacionTecnicaRechazo::create([
            'consulta_fk' => $request->consulta_id,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        $consulta = Cedula::find( $request->consulta_id );
        $consulta->status = 102; // Rechazo evaluacion tecnica
        $consulta->save();
        
        return response()->json("exito");
    }
    
    function guardarRechazoEvaluacionJuridica(Request $request){

        $rechazo_analisis = EvaluacionJuridica::create([
            'consulta_fk' => $request->consulta_id,
            'motivo_rechazo' => $request->motivo_rechazo
        ]);

        $consulta = Cedula::find( $request->consulta_id );
        $consulta->status = 103; // Rechazo evaluacion tecnica
        $consulta->save();
        
        return response()->json("exito");
    }
    
    function guardarEvaluacionJuridica( Request $request ){
        $consulta = Cedula::find($request->consulta_id);
        $consulta->status = 4;
        $consulta->save();
        return response()->json(["exito"]);
    }
    
    function obtenerParametrosValoracionTecnica(){
        $query = '
        SELECT
            cet.id categoria_id,
            cet.descripcion categoria_descripcion,
            cat.id parametro_id,
            cat.descripcion parametro_descripcion 
        FROM
            c_apartados_evaluacion_tecnica cat
            LEFT JOIN c_categoria_evaluacion_tecnica cet ON cat.categoria_evaluacion_tecnica_fk = cet.id';

        $parametros = [];
        
        $tmp = [];
        $resultado = [];
        $tmp['categoria']['id'] = "";
        $tmp['categoria']['descripcion'] = "";

        $resultado_query_bd = DB::select( DB::raw($query) );
        
        foreach ($resultado_query_bd as $parametro) {
            
            if( $tmp['categoria']['id'] != $parametro->categoria_id){
                $resultado[] = $tmp;
                $tmp = [];
                $tmp['categoria']['id'] = ucwords($parametro->categoria_id);
                $tmp['categoria']['descripcion'] = ucwords($parametro->categoria_descripcion);
            }
            $tmpx['id'] = ucwords($parametro->parametro_id);
            $tmpx['descripcion'] = ucwords($parametro->parametro_descripcion);
            $tmp['parametros'][] = $tmpx;

        }
        $resultado[] = $tmp;
        unset($resultado[0]);
        
        // echo "<pre>";
        // print_r( $resultado );
        // exit;
    
        // return response()->json($resultado);
        return $resultado;

    }

    function usuariosSistema(){
        if( Auth::check() && Auth::user()->rol != 'administracion') {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }
        
        $perPage = 10;
        $usuarios = User::paginate($perPage);
        $total = $usuarios->total();
        $page_number = round($total / $perPage);

        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_usuarios', [
            'page_number' => $page_number,
            'usuarios' => $usuarios,
        ]);
    }
    
    function usuarios(){
        if( Auth::check() && Auth::user()->rol != 'administracion') {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }
        
        $perPage = 10;
        $usuarios = User::paginate($perPage);
        $total = $usuarios->total();
        $page_number = round($total / $perPage);

        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_usuarios', [
            'page_number' => $page_number,
            'usuarios' => $usuarios,
        ]);
    }

    function obtenerCatalogoInstrumentos(){
        return Instrumento::get()->toArray();
    }

}

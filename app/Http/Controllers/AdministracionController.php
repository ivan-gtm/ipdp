<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App;
use App\Models\Cedula;
use App\Models\User;
use App\Models\EvaluacionTecnica;
use App\Models\Instrumento;
use App\Models\EvaluacionAnalisisSubtemas;
use App\Models\EvualuacionTecnicaDetalle;
use App\Models\EvaluacionAnalisis;
use App\Models\FormatoInterno;
use App\Models\EvaluacionTecnicaRechazo;
use App\Models\EvaluacionJuridica;
use App\Models\EvaluacionAnalisisTemas;
use App\Models\EvaluacionIntegracion;

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
        $estados_validos = [2, 102];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id','folio','created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("'interno' as origen")
            ->selectRaw("'formato_interno' as tipo")
            ->orderByDesc('id');
        
        $cedulas = Cedula::whereIn('status', $estados_validos)
                    ->select('cedulas.id','cedulas.folio','cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido','cedulas.origen')
                    ->selectRaw("'cedula' as tipo")
                    ->union($formatos_interno)
                    ->orderByDesc('id')
                    ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round( $total / $perPage );

        $parametros = self::obtenerParametrosValoracionTecnica();
        $instrumentos = self::obtenerCatalogoInstrumentos();
        
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
        $estados_validos = [3, 103];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id','folio','created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("'interno' as origen")
            ->selectRaw("'formato_interno' as tipo")
            ->orderByDesc('id');
        
        $cedulas = Cedula::whereIn('status', $estados_validos)
                    ->select('cedulas.id','cedulas.folio','cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido','cedulas.origen')
                    ->selectRaw("'cedula' as tipo")
                    ->union($formatos_interno)
                    ->orderByDesc('id')
                    ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round( $total / $perPage );

        $parametros = self::obtenerParametrosValoracionTecnica();
        
        return view('ipdp.admin_evaluacion_juridica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros
        ]);
    }

    public function guardarConsultaPublica(Request $request)
    {
        
        App::setLocale('es');

        $validatedData = $request->validate([
            'folio' => 'nullable|digits:6',
            'nombre' => 'nullable',
            'primer_apellido' => 'nullable',
            'segundo_apellido' => 'nullable',
            'edad' => 'nullable|min:1|max:99',
            'ocupacion' => 'nullable',
            'genero' => ['nullable',Rule::in(['Masculino', 'Femenino','Otro'])],
            'correo' => 'nullable|email|unique:cedulas',
            'celular' => 'nullable|digits:10',
            'calle' => 'nullable',
            'num_exterior' => 'nullable',
            'num_interior' => 'nullable',
            'manzana' => 'nullable',
            'cp' => 'nullable|digits:5',
            'alcaldia' => 'nullable',
            'colonia' => 'nullable',
            'representante' => 'nullable',
            'instrumento_observar' => ['nullable',Rule::in(['2020-2040', '2020-2035','2020-2040,2020-2035'])],
            'comentarios' => 'nullable',
            'incluye_documentos' => 'nullable',
            'numero_documentos' => 'nullable|numeric|min:0|max:3',
            'conocimiento_datos_personales' => ['nullable',Rule::in(['si','no'])],
        ]);

        $validatedData['origen'] = 'interna';
        $show = Cedula::create($validatedData);
        return response()->json([]);

    }

    function registrarConsultaPublica(){
        if( Auth::check() && ( Auth::user()->rol != 'recepcion' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'Usuario Registrado con exito!');
        }

        $numero_folio = mt_rand(100000, 999999);

        return view('ipdp.admin_consulta_publica', [
            'numero_folio' => $numero_folio
        ]);
    }
    
    function evaluacionIntegracion(){
        // echo Auth::user()->rol;
        // exit;
        if( Auth::check() && ( Auth::user()->rol != 'integracion_pgot' && Auth::user()->rol != 'integracion_pgd' && Auth::user()->rol != 'administracion') ) {
            return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        }

        $rol_usuario = Auth::user()->rol;
        $tipos_de_instrumentos_visibles = ['PGD+PGOT'];
        // $where_raw = "( OR evaluador_pgd_fk IS NULL)";
        $where_raw = "(";
        
        if( $rol_usuario == 'administracion'){
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL || evaluador_pgd_fk IS NULL";
        } elseif( $rol_usuario == 'integracion_pgd'){
            array_push($tipos_de_instrumentos_visibles, 'PGD');
            $where_raw .= "evaluador_pgd_fk IS NULL";
        } elseif( $rol_usuario == 'integracion_pgot'){
            array_push($tipos_de_instrumentos_visibles, 'PGOT');
            $where_raw .= "evaluador_pgot_fk IS NULL";
        }
        $where_raw .= ")";

        $perPage = 10;
        
            
        $cedulas = DB::table('cedulas')
            ->leftJoin('evualuacion_integracion', 'cedulas.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', 'cedulas.id', '=', 'evualuacion_tecnica.consulta_fk')
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id','cedulas.origen','cedulas.folio', 'cedulas.created_at','cedulas.status', 'cedulas.nombre','cedulas.primer_apellido','cedulas.segundo_apellido','c_instrumento.descripcion as instrumento','evualuacion_integracion.evaluador_pgot_fk','evualuacion_integracion.evaluador_pgd_fk')
            ->whereIn('cedulas.status', [4, 104])
            ->whereIn('c_instrumento.descripcion', $tipos_de_instrumentos_visibles)
            ->whereRaw( $where_raw )
            ->orderByDesc('cedulas.id')
            ->paginate($perPage);
            
        $total = $cedulas->total();

        $page_number = round($total / $perPage);

        // echo "<pre>";
        // print_r( Auth::user()->rol );
        // print_r( $cedulas[0] );
        // exit;

        return view('ipdp.admin_evaluacion_integracion', [
            'page_number' => $page_number,
            'cedulas' => $cedulas
        ]);
    }

    function guardarEvaluacionIntegracion(Request $request){
        
        // if( Auth::check() && ( ( Auth::user()->rol != 'integracion_pgot' || Auth::user()->rol != 'integracion_pgd' ) && Auth::user()->rol != 'administracion') ) {
        //     return redirect()->route('administracion.home')->with('status', 'No tiene permisos para visualizar este modulo!');
        // }

        $info_cedula = DB::table('cedulas')
            ->leftJoin('evualuacion_integracion', 'cedulas.id', '=', 'evualuacion_integracion.consulta_fk')
            ->join('evualuacion_tecnica', 'cedulas.id', '=', 'evualuacion_tecnica.consulta_fk')
            ->join('c_instrumento', 'evualuacion_tecnica.instrumento_fk', '=', 'c_instrumento.id')
            ->select('cedulas.id','cedulas.origen','cedulas.folio', 'cedulas.status', 'c_instrumento.descripcion as instrumento','evualuacion_integracion.evaluador_pgot_fk','evualuacion_integracion.evaluador_pgd_fk')
            ->where('cedulas.id', $request->consulta_fk)
            ->orderByDesc('cedulas.id')
            ->first();
        
        $evaluador_pgd_fk = null;
        $evaluador_pgot_fk = null;
        
        $cedula = Cedula::find($request->consulta_fk);

        if( Auth::check() && Auth::user()->rol == 'integracion_pgd' ) {
            $evaluador_pgd_fk = Auth::user()->id;
            
            // Si la cedula es solo PGD, cambiamos el estado para que no sea visible por el resto
            if( $info_cedula->instrumento ==  'PGD' ){
                $cedula->status = 5;
            }
            
        } elseif( Auth::check() && Auth::user()->rol == 'integracion_pgot' ) {
            $evaluador_pgot_fk = Auth::user()->id;

            // Si la cedula es solo PGOT, cambiamos el estado para que no sea visible por el resto
            if( $info_cedula->instrumento ==  'PGOT' ){
                $cedula->status = 5;
            }

        } elseif( Auth::check() && Auth::user()->rol == 'administracion' ) {
            $evaluador_pgot_fk = Auth::user()->id;
            $evaluador_pgd_fk = Auth::user()->id;

            $cedula->status = 5;
        }

        if( $info_cedula->instrumento ==  'PGD+PGOT' 
            && Auth::check() 
            && (
                (
                    Auth::user()->rol == 'integracion_pgot' 
                    && intval($info_cedula->evaluador_pgd_fk) > 0 
                ) ||
                (
                    Auth::user()->rol == 'integracion_pgd' 
                    && intval($info_cedula->evaluador_pgot_fk) > 0
                )
            ) ){
            $cedula->status = 5;
        }

        if( $info_cedula->instrumento ==  'PGD+PGOT' && intval( $info_cedula->evaluador_pgot_fk ) > 0 ){
            $evaluador_pgot_fk = $info_cedula->evaluador_pgot_fk;
        }

        if( $info_cedula->instrumento ==  'PGD+PGOT' && intval($info_cedula->evaluador_pgd_fk) > 0 ){
            $evaluador_pgd_fk = $info_cedula->evaluador_pgd_fk;
        }
        
        $cedula->save();
        
        $count = EvaluacionIntegracion::where('consulta_fk', $request->consulta_fk)->count();
        
        if( $count == 0){
            $integracion = EvaluacionIntegracion::create([
                'consulta_fk' => $request->consulta_fk,
                'evaluador_pgot_fk' => $evaluador_pgot_fk,
                'evaluador_pgd_fk' => $evaluador_pgd_fk,
                'eje_estrategia' => $request->eje_estrategia,
                'accion_objetivo' => $request->accion_objetivo
            ]);
        } else {
            EvaluacionIntegracion::where('consulta_fk' , $request->consulta_fk)
            ->update([
                'evaluador_pgot_fk' => $evaluador_pgot_fk,
                'evaluador_pgd_fk' => $evaluador_pgd_fk,
                'eje_estrategia' => $request->eje_estrategia,
                'accion_objetivo' => $request->accion_objetivo
            ]);
        }

        return response()->json(["exito"]);
    }
    
    function obtenerEvaluacionJuridica(Request $request){
        
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
        WHERE 
            et.tipo_documento = \''.$request->tipo_documento.'\'
            AND et.consulta_fk ='.$request->consulta_id;
        
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
        $evaluacion_tecnica = EvaluacionTecnica::where('consulta_fk', $request->consulta_id)
                                ->where('tipo_documento', $request->tipo_documento)
                                ->first();

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
        $estados_validos = [1, 101];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id','folio','created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("'interno' as origen")
            ->selectRaw("'formato_interno' as tipo")
            ->orderByDesc('id');
        
        $cedulas = Cedula::whereIn('status', $estados_validos)
                    ->select('cedulas.id','cedulas.folio','cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido','cedulas.origen')
                    ->selectRaw("'cedula' as tipo")
                    ->union($formatos_interno)
                    ->orderByDesc('id')
                    ->paginate($perPage);

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
        $estados_validos = [1, 101];

        $formatos_interno = FormatoInterno::whereIn('status', $estados_validos)
            ->select('id','folio','created_at', 'status', 'nombre', 'primerApellido as primer_apellido')
            ->selectRaw("'interno' as origen")
            ->selectRaw("'formato_interno' as tipo")
            ->orderByDesc('id');
        
        $cedulas = Cedula::whereIn('status', $estados_validos)
                    ->select('cedulas.id','cedulas.folio','cedulas.created_at', 'cedulas.status', 'cedulas.nombre', 'cedulas.primer_apellido','cedulas.origen')
                    ->selectRaw("'cedula' as tipo")
                    ->union($formatos_interno)
                    ->orderByDesc('id')
                    ->paginate($perPage);

        $total = $cedulas->total();
        $page_number = round( $total / $perPage );
        
        return view('ipdp.admin_recepcion', [
            'page_number' => $page_number,
            'cedulas' => $cedulas
            // 'parametros' => $parametros
        ]);

    }
    
    function detalleConsultaPublica( $folio ){
        
        $cedula = DB::table('cedulas')->where('folio','=',$folio)->first();
        $archivos_cedula = DB::table('cedula_archivo')
                    ->where('tipo_consulta','=','consulta-publica')
                    ->where('folio','=',$folio)
                    ->get();

        if( isset($cedula->instrumento_observar) ) {
            $instrumento_observar = self::obtenerInstrumentosAObservar( $cedula->instrumento_observar );
        } else {
            $instrumento_observar = null;
        }
        
        return view('ipdp.admin_detalle_consulta_publica', [
            'cedula' => $cedula,
            'instrumento_observar' => $instrumento_observar,
            'archivos_cedula' => $archivos_cedula
        ]);

    }
    
    function detalleFormatoInterno( $folio ){
        
        $cedula = DB::table('consulta_indigena')->where('folio','=',$folio)->first();
        $archivos_cedula = DB::table('cedula_archivo')
                    ->where('tipo_consulta','=','consulta-indigena')
                    ->where('folio','=',$folio)
                    ->get();

        return view('ipdp.admin_detalle_formato_interno', [
            'cedula' => $cedula,
            // 'instrumento_observar' => $instrumento_observar,
            'archivos_cedula' => $archivos_cedula
        ]);

    }

    function obtenerInstrumentosAObservar( $instrumentos ){
        $arreglo_instrumentos = explode(',',$instrumentos);
        foreach ($arreglo_instrumentos as $anio_instrumento) {
            $instrumento_x = null;
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
        
        if( isset($request->tipo_documento) && $request->tipo_documento == 'cedula'){
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 2;
            $consulta->save();
        } elseif( isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno'){
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 2;
            $consulta->save(); 
        }
        
        EvaluacionAnalisis::create([
            'consulta_fk' => $request->consulta_id,
            'tipo_documento' => $request->tipo_documento,
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
            'tipo_documento' => $request->tipo_documento,
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
        
        if( isset($request->tipo_documento) && $request->tipo_documento == 'cedula'){
            $consulta = Cedula::find($request->folio_id);
            $consulta->status = 3;
            $consulta->save();
        } elseif( isset($request->tipo_documento) && $request->tipo_documento == 'formato_interno'){
            $consulta = FormatoInterno::find($request->folio_id);
            $consulta->status = 3;
            $consulta->save(); 
        }

        return response()->json(["exito"]);
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
        if($request->tipo_documento == 'formato_interno'){
            $consulta = FormatoInterno::find($request->consulta_id);
            $consulta->status = 4;
            $consulta->save();
        } elseif($request->tipo_documento == 'cedula'){
            $consulta = Cedula::find($request->consulta_id);
            $consulta->status = 4;
            $consulta->save();
        }


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
        $usuarios = User::orderByDesc('id')->paginate($perPage);
        $total = $usuarios->total();
        $page_number = round($total / $perPage);

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

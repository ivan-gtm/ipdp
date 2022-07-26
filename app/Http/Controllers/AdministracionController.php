<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\Models\Cedula;
use App\Models\User;
use App\Models\EvaluacionTecnica;
use App\Models\EvualuacionTecnicaDetalle;
use Illuminate\Support\Facades\Auth;

class AdministracionController extends Controller
{
    function evaluacionTecnica(){
        
        $perPage = 2;
        $cedulas = Cedula::where('status','=',2)
            ->paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();
        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_evaluacion_tecnica', [
            'page_number' => $page_number,
            'cedulas' => $cedulas,
            'parametros' => $parametros
        ]);
    }
    
    function evaluacionJuridica(){
        $perPage = 2;
        $cedulas = Cedula::where('status','=',3)
            ->paginate($perPage);
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
    
    function obtenerEvaluacionJuridica( $consulta_id ){
        
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

        return response()->json($resultado);
    }

    function evaluacionAnalisis(){
        if (Auth::check()) {
            $user_name = Auth::user()->name;
            $user_mail = Auth::user()->email;
        }


        $perPage = 2;
        $cedulas = Cedula::paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);

        $parametros = self::obtenerParametrosValoracionTecnica();
        // $columnas = ceil(sizeof($parametros) / 2);
        // echo "<pre>";
        // print_r( $parametros );
        // exit;

        return view('ipdp.admin_analisis', [
            'user_name',$user_name,
            'user_mail',$user_mail,
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
        
        return view('ipdp.admin_detalle_consulta', [
            'cedula' => $cedula,
            'archivos_cedula' => $archivos_cedula
        ]);

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
        
        $perPage = 2;
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

}

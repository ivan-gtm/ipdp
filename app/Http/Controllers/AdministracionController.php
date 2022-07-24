<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;
use Illuminate\Support\Facades\DB;

class AdministracionController extends Controller
{
    function home(){
        
        // $cedulas = DB::table('cedulas')->get();
        $perPage = 2;
        $cedulas = Cedula::paginate($perPage);
        $total = $cedulas->total();
        $page_number = round($total / $perPage);
        // echo $page_number;
        // exit;
        // echo $cedulas->getPageName();
        // echo $cedulas->nextPageUrl();

        return view('ipdp.admin_analisis', [
            'page_number' => $page_number,
            'cedulas' => $cedulas
        ]);

    }
    
    function detalleConsultaPublica( $folio ){
        
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

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;

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

        return view('ipdp.admin', [
            'page_number' => $page_number,
            'cedulas' => $cedulas
        ]);

    }

    function getEstadoSolicitud( $db_status ){
        switch ($db_status) {
            case '1':
                return 'Pendiente Valoración Técnica';
                break;
            case '2':
                # code...
                break;
            default:
                # code...
                break;
        }
    }
}

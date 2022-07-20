<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;

use SVG\SVG;

use SVG\Nodes\Shapes\SVGCircle;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Barryvdh\DomPDF\Facade as PDF;
use Image;


// use PhpOffice\PhpSpreadsheet\Helper\Sample;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;

use App\Models\Template;



class IPDPController extends Controller
{
    function index(){
        return view('ipdp.home', []);
    }
    
    function login(){
        return view('ipdp.login', []);
    }
    
    function consultaIndigena(){
        return view('ipdp.consulta_indigena', []);
    }
    
    function recuperaContrasena(){
        return view('ipdp.recupera_contrasena', []);
    }
    
    function buscarFolio(){
        return view('ipdp.buscar_folio', []);
    }
}

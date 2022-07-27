<?php

namespace App\Http\Controllers;

class IPDPController extends Controller
{
    function index(){
        return view('ipdp.home', []);
    }

    function recuperaContrasena(){
        return view('ipdp.recupera_contrasena', []);
    }
    
    function buscarFolio(){
        return view('ipdp.buscar_folio', []);
    }
}

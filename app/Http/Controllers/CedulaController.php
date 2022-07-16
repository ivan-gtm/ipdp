<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;
use Dompdf\Dompdf;

class CedulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ipdp.registro_cedula', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // echo "<pre>";
        // print_r( $request->all() );
        // exit;

        $validatedData = $request->validate([
            'primer_apellido' => 'required',
            'nombre' => 'required',
            'segundo_apellido' => 'required',
            'edad' => 'required',
            'ocupacion' => 'required',
            'genero' => 'required',
            'correo' => 'required',
            'celular' => 'required',
            'calle' => 'required',
            'num_exterior' => 'required',
            'num_interior' => 'required',
            'manzana' => 'required',
            'cp' => 'required',
            'alcaldia' => 'required',
            'colonia' => 'required',
            'representante' => 'required',
            'instrumento_observar' => 'required',
            'comentarios' => 'required',
            'incluye_documentos' => 'required',
            'numero_documentos' => 'required',
            'conocimiento_datos_personales' => 'required',
        ]);

        $show = Cedula::create($validatedData);
        // return redirect('/confirmacion')->with('success', 'Game is successfully saved');
        return response()->json([]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdf($id)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
    
    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

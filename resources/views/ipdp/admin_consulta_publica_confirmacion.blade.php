@extends('layouts.admin')
@section('title', 'Confirmación registro de consulta')

@section('content')
<div class="row">
    <div class="col-10 offset-md-1">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <img class="img-fluid" src="{{ asset( 'imgs/solicitud_enviada.png' ) }}" width="150px">
                <h1>Su solicitud ha sido registrada con exito.</h1>
                <h3>FOLIO: {{ $numero_folio }}</h3>

                Para descargar su comprobante, por favor dar click en el
                siguiente botón y su descarga comenzará en breve…

                <div class="row">
                    <div class="col-12 pt-3">
                        <!-- <a class="btn btn-outline-primary" href="{{ route('consulta_indigena.pdf',[
                                        'numero_folio' => $numero_folio
                                    ]) }}">DESCARGAR ARCHIVO</a> -->
                        <a class="btn btn-outline-primary" href="{{ route('cedula.pdf',[
                                        'numero_folio' => $numero_folio
                                    ]) }}">DESCARGAR ARCHIVO</a>
                        <br>
                        ó
                        <br>
                        <a class="btn btn-outline-secondary" href="{{ route('administracion.evaluacionRecepcion') }}">
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
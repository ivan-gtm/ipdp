@extends('layouts.admin')
@section('title', 'GESTIÓN DE SOLICITUDES')
@section('modulo_titulo', 'GESTIÓN DE SOLICITUDES')
@section('head')
<script src="https://kit.fontawesome.com/543cc88f75.js" crossorigin="anonymous"></script>
<style>
    ul.panel-acciones {
        display: flex;
        width: 100%;
        /* padding: 0.35rem 1.2rem; */
        clear: both;
        font-weight: 400;
        text-align: inherit;
        text-decoration: none;
        white-space: nowrap;
        background-color: transparent;
        border: 0;
    }

    ul.panel-acciones>li {
        float: left;
        list-style: none;
        padding: 0 5px;
    }

    ul.panel-acciones>li>a {
        font-size: 18px;
    }

    .btn-danger {
        color: #fff;
        background-color: var(--vz-input-bg);
        background-clip: padding-box;
        border: 1px solid var(--vz-input-border);
        width: 294px;
    }

    /* .table>:not(caption)>*>* {
            padding: 0.2rem 0.2rem;
        } */
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <center>
            <h3>PERSONA PARTICIPANTE</h3>
        </center>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <strong>Nombre</strong>
                        <br>
                        {{ $cedula->nombre }}
                    </td>
                    <td>
                        <strong>Primer Apellido</strong>
                        <br>
                        {{ $cedula->primer_apellido }}
                    </td>
                    <td>
                        <strong>Segundo Apellido</strong>
                        <br>
                        {{ $cedula->segundo_apellido }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Ocupación</strong>
                        <br>
                        {{ $cedula->ocupacion }}
                    </td>
                    <td>
                        <strong>Edad</strong>
                        <br>
                        {{ $cedula->edad }}
                    </td>
                    <td>
                        <strong>Género</strong>
                        <br>
                        {{ $cedula->genero }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Correo electrónico</strong>
                        <br>
                        {{ $cedula->correo }}
                    </td>
                    <td>
                        <strong>Teléfono celular</strong>
                        <br>
                        {{ $cedula->celular }}
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
        <center>
            <h3>DOMICILIO</h3>
        </center>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <strong>Calle</strong>
                        <br>
                        {{ $cedula->calle }}
                    </td>
                    <td>
                        <strong>Numero Exterior</strong>
                        <br>
                        {{ $cedula->num_exterior }}
                    </td>
                    <td>
                        <strong>Numero Interior</strong>
                        <br>
                        {{ $cedula->num_interior }}
                    </td>
                    <td>
                        <strong>Manzana / Lote</strong>
                        <br>
                        {{ $cedula->manzana }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Código Postal</strong>
                        <br>
                        {{ $cedula->cp }}
                    </td>
                    <td>
                        <strong>Alcaldía</strong>
                        <br>
                        {{ $cedula->alcaldia }}
                    </td>
                    <td colspan="2">
                        <strong>Colonia, Pueblo o Barrio</strong>
                        <br>
                        {{ $cedula->colonia }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table class="table">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <strong>TIPO DE REPRESENTANTE:</strong>

                        {{ $cedula->representante }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="text-center">INSTRUMENTO DE PLANEACIÓN A OBSERVAR</h4>
        <table class="table">
            <tbody>
                @foreach ($instrumento_observar as $instrumento)
                <tr>
                    <td style="text-align: center;">
                        <strong>VIGENCIA</strong>
                        <br>
                        {{ $instrumento['periodo'] }}
                    </td>
                    <td>
                        <strong>
                            {{ $instrumento['descripcion'] }}
                        </strong>
                        <br>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="row">
    <div class="col-12">
        <br>
        <center>
            <h3>OPINIÓN, RECOMENDACIÓN PROPUESTA</h3>
        </center>
        <p>{{ $cedula->comentarios }}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        @if( sizeof($archivos_cedula) > 0 )
        <h2 class="text-center">ARCHIVOS</h2>
        <div class="row pb-3">
            @foreach ($archivos_cedula as $archivo)
            <div class="col-md-3">
                <div class="card">
                    <a href="{{ asset('storage/'.$archivo->file_path) }}" class="card-link" target="_blank">
                        @if( substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'jpg'
                        || substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'png'
                        || substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'jpeg')
                        <img src="{{ asset('storage/'.$archivo->file_path) }}" class="card-img-top">
                        @else
                        <img src="https://via.placeholder.com/288x180.png/bc955c/fff?text={{ substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) }}" class="card-img-top">
                        @endif
                    </a>

                    <div class="card-body" style="display:none">
                        <h5 class="card-title">Card title</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                    <ul class="list-group list-group-flush" style="display:none">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{ asset('storage/'.$archivo->file_path) }}" class="card-link" download>DESCARGAR ARCHIVO</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection


@section('modales')
<!-- Modal -->
<div class="modal fade" id="rechazoModal" tabindex="-1" aria-labelledby="rechazoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rechazoModalLabel">Rechazar Folio "342344"
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Escriba una breve descripción, con el motivo del rechazo:
                <textarea class="form-control" name="motivo_rechazo" id="" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar Rechazo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aceptarConsultaModal" tabindex="-1" aria-labelledby="rechazoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- <div class="modal-header">
                    <h5 class="modal-title"
                        id="rechazoModalLabel">Aceptar Folio "342344"
                    </h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div> -->
            <div class="modal-body">
                ¿Esta seguro, el poder aceptar el folio "342344"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Aceptar Consulta</button>
            </div>
        </div>
    </div>
</div>
@endsection
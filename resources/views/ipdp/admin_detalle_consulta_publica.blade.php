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
                        {{ isset($cedula->nombre) ? $cedula->nombre : null }}
                    </td>
                    <td>
                        <strong>Primer Apellido</strong>
                        <br>
                        {{ isset($cedula->primer_apellido) ? $cedula->primer_apellido : null }}
                    </td>
                    <td>
                        <strong>Segundo Apellido</strong>
                        <br>
                        {{ isset($cedula->segundo_apellido) ? $cedula->segundo_apellido : null }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Ocupación</strong>
                        <br>
                        {{ isset($cedula->ocupacion) ? $cedula->ocupacion : null }}
                    </td>
                    <td>
                        <strong>Edad</strong>
                        <br>
                        {{ isset($cedula->edad) ? $cedula->edad : null }}
                    </td>
                    <td>
                        <strong>Género</strong>
                        <br>
                        {{ isset($cedula->genero) ? $cedula->genero : null }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Correo electrónico</strong>
                        <br>
                        {{ isset($cedula->correo) ? $cedula->correo : null }}
                    </td>
                    <td>
                        <strong>Teléfono celular</strong>
                        <br>
                        {{ isset( $cedula->celular ) ? $cedula->celular : null }}
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
                        {{ isset($cedula->calle) ? $cedula->calle : null }}
                    </td>
                    <td>
                        <strong>Numero Exterior</strong>
                        <br>
                        {{ isset($cedula->num_exterior) ? $cedula->num_exterior : null }}
                    </td>
                    <td>
                        <strong>Numero Interior</strong>
                        <br>
                        {{ isset($cedula->num_interior) ? $cedula->num_interior : null }}
                    </td>
                    <td>
                        <strong>Manzana / Lote</strong>
                        <br>
                        {{ isset($cedula->manzana) ? $cedula->manzana : null }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Código Postal</strong>
                        <br>
                        {{ isset($cedula->cp) ? $cedula->cp : null }}
                    </td>
                    <td>
                        <strong>Alcaldía</strong>
                        <br>
                        {{ isset($cedula->alcaldia) ? $cedula->alcaldia : null }}
                    </td>
                    <td colspan="2">
                        <strong>Colonia, Pueblo o Barrio</strong>
                        <br>
                        {{ isset($cedula->colonia) ? $cedula->colonia : null }}
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

                        {{ isset( $cedula->representante) ? $cedula->representante : null }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="text-center">INSTRUMENTO DE PLANEACIÓN A OBSERVAR</h4>
        <table class="table">
            <tbody>
                @if( isset($instrumento_observar) )
                    @foreach ($instrumento_observar as $instrumento)
                    <tr>
                        <td style="text-align: center;">
                            <strong>VIGENCIA</strong>
                            <br>
                            {{ isset($instrumento['periodo']) ? $instrumento['periodo'] : null }}
                        </td>
                        <td>
                            <strong>
                                {{ isset($instrumento['descripcion']) ? $instrumento['descripcion'] : null}}
                            </strong>
                            <br>
                        </td>
                    </tr>
                    @endforeach
                @endif
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
        <p>{{ isset($cedula->comentarios) ? $cedula->comentarios : null }}</p>
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
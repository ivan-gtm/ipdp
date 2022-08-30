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
        <h3 class="text-center">
            <strong>FOLIO:</strong>
            {{ isset($cedula->folio) ? $cedula->folio : '-' }}
        </h3>
        <hr>
        <h4 class="text-center">DATOS DEL ENLACE</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <strong>Tipo Consulta:</strong>
                        <br>
                        {{ isset($cedula->tipoConsulta) ? $cedula->tipoConsulta : '-' }}
                    </td>
                    <td>
                        <!-- <strong>Tipo Consulta:</strong> -->
                        <br>
                        {{ isset($cedula->tipoFormato) ? $cedula->tipoFormato : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Nombre Completo:</strong>
                        <br>
                        {{ isset($cedula->nombreCompleto) ? $cedula->nombreCompleto : '-' }}
                    </td>
                    <td>
                        <strong>Fecha:</strong>
                        <br>
                        {{ isset($cedula->fechaSolicitud) ? $cedula->fechaSolicitud : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Correo Electrónico:</strong>
                        <br>
                        {{ isset($cedula->correo) ? $cedula->correo : '-' }}
                    </td>
                    <td>
                        <strong>Telefono:</strong>
                        <br>
                        {{ isset($cedula->telefono) ? $cedula->telefono : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>¿Se tienen datos de quien participa?</strong>
                        <br>
                        {{ isset($cedula->tieneDatosParticipante) ? $cedula->tieneDatosParticipante : '-' }}
                    </td>
                    <td>
                        <strong>¿Es representante?</strong>
                        <br>
                        {{ isset($cedula->esRepresentante) ? $cedula->esRepresentante : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Autoridad Representativa</strong>
                        <br>
                        {{ isset($cedula->tipoAutoridad) ? $cedula->tipoAutoridad : '-' }}
                    </td>
                    <td>
                        <strong>Nombre:</strong>
                        <br>
                        {{ isset($cedula->nombrePuebloComunidad) ? $cedula->nombrePuebloComunidad : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Tipo Organizacion:</strong>
                        <br>
                        {{ isset($cedula->tipoOrganizacion) ? $cedula->tipoOrganizacion : '-' }}
                    </td>
                    <td>
                        <strong>Nombre Organizacion:</strong>
                        <br>
                        {{ isset($cedula->nombreOrganizacion) ? $cedula->nombreOrganizacion : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
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
                        {{ isset($cedula->nombre) ? $cedula->nombre : '-' }}
                    </td>
                    <td>
                        <strong>Primer Apellido</strong>
                        <br>
                        {{ isset($cedula->primerApellido) ? $cedula->primerApellido : '-' }}
                    </td>
                    <td>
                        <strong>Segundo Apellido</strong>
                        <br>
                        {{ isset($cedula->segundoApellido) ? $cedula->segundoApellido : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Ocupación</strong>
                        <br>
                        {{ isset($cedula->ocupacion) ? $cedula->ocupacion : '-' }}
                    </td>
                    <td>
                        <strong>Edad</strong>
                        <br>
                        {{ isset($cedula->edad) ? $cedula->edad : '-' }}
                    </td>
                    <td>
                        <strong>Género</strong>
                        <br>
                        {{ isset($cedula->genero) ? $cedula->genero : '-' }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Correo electrónico</strong>
                        <br>
                        {{ isset($cedula->correo) ? $cedula->correo : '-' }}
                    </td>
                    <td>
                        <strong>Teléfono celular</strong>
                        <br>
                        {{ isset($cedula->celular) ? $cedula->celular : '-' }}
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
                        {{ isset($cedula->calle) ? $cedula->calle : '-' }}
                    </td>
                    <td>
                        <strong>Numero Exterior</strong>
                        <br>
                        {{ isset($cedula->numExterior) ? $cedula->numExterior : '-' }}
                    </td>
                    <td>
                        <strong>Numero Interior</strong>
                        <br>
                        {{ isset($cedula->numInterior) ? $cedula->numInterior : '-' }}
                    </td>
                    <td>
                        <strong>Manzana / Lote</strong>
                        <br>
                        {{ isset($cedula->manzana) ? $cedula->manzana : '-' }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Código Postal</strong>
                        <br>
                        {{ isset($cedula->cp) ? $cedula->cp : '-' }}
                    </td>
                    <td>
                        <strong>Alcaldía</strong>
                        <br>
                        {{ isset($cedula->alcaldia) ? $cedula->alcaldia : '-' }}
                    </td>
                    <td colspan="2">
                        <strong>Colonia, Pueblo o Barrio</strong>
                        <br>
                        {{ isset($cedula->colonia) ? $cedula->colonia : '-' }}
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
                        <strong>FORMA DE PARTICIPACIÓN:</strong>
                        <br>
                        @if( isset($cedula->tipoParticipacion) )
                            {{ isset($cedula->tipoParticipacion) ? $cedula->tipoParticipacion : '-' }}
                        @elseif( isset($cedula->participacionOtro) )
                            {{ isset($cedula->participacionOtro) ? $cedula->participacionOtro : '-' }}
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
        <h4 class="text-center">INFORMACIÓN DE LA ACTIVIDAD</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <strong>NOMBRE DEL TALLER, FORO O ACTIVIDAD:</strong>
                        <br>
                        {{ isset($cedula->nombreActividad) ? $cedula->nombreActividad : '-' }}
                    </td>
                    <td style="text-align: center;">
                        <strong>FECHA:</strong>
                        <br>
                        {{ isset($cedula->fechaActividad) ? $cedula->fechaActividad : '-' }}
                    </td>
                    <td style="text-align: center;">
                        <strong>LUGAR:</strong>
                        <br>
                        {{ isset($cedula->lugarActividad) ? $cedula->lugarActividad : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>
        <br>
        <h4 class="text-center">ANEXOS</h4>
        <table class="table">
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        <strong>TIPO DE DOCUMENTOS:</strong>
                        <br>
                        {{ isset($cedula->tipoDocumentos) ? $cedula->tipoDocumentos : null }}
                    </td>
                </tr>
            </tbody>
        </table>
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



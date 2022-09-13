@extends('layouts.frontend')
@section('title', 'Seguimiento de folios de consultas ciudadanas')

@section('head')
<script src="https://kit.fontawesome.com/543cc88f75.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-12 text-center">
        <h1>Seguimiento por folio</h1>
        Para dudas o aclaraciones contactanos con tu numero de folio a <a href="mailto:contacto_ipdp@cdmx.gob.mx">contacto_ipdp@cdmx.gob.mx</a>
    </div>
    <div class="col-md-10 offset-md-1">
        <div class="table-responsive table-card mb-4 p-3">
            <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                <thead>
                    <tr style="background-color: #f3f3f3;">
                        <th  width="10">Folio<br>Solicitud</th>
                        <th  width="20">Fecha</th>
                        <th class="text-center" width="60">Situación</th>
                        <th class="text-center"  width="10">Acciones</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all" id="ticket-list-data">
                    <tr>
                        <td class="id">
                            {{ $cedula->folio }}
                        </td>
                        <td class="tasks_name">
                            {{ $cedula->created_at }}
                        </td>

                        <td class="text-center">
                            @if( $cedula->status < 5 )
                                <span class="badge rounded-pill bg-secondary">
                                    Tu solicitud esta en valoración
                                </span>
                            @elseif( $cedula->status == 5 )
                                <p>
                                    Se informa que derivado de la valoración técnica y jurídica realizada a la Recomendación/Propuesta, el presente folio será considerado en el Anexo de Participación del Proceso de la Consulta Indígena.
                                </p>
                            @elseif( $cedula->status == 101)
                                <p>
                                    Se informa que derivado de la valoración realizada a la Recomendación/Propuesta en el Proceso de la Consulta Pública, la misma será integrada en lo conducente en el Anexo de Participación.
                                </p>
                            @elseif( $cedula->status == 102)
                                <p>
                                    Se informa que derivado de la valoración técnica realizada a la Recomendación/Propuesta en el Proceso de la Consulta Pública, la misma será integrada en lo conducente en el Anexo de Participación.
                                </p>
                            @elseif( $cedula->status > 100 && isset($instrumento->descripcion) && $instrumento->descripcion == 'PGD+PGOT')
                                <p>
                                    Se informa que derivado de la valoración técnica y jurídica realizada a la Recomendación/Propuesta en el Proceso de la Consulta Indígena, la misma será integrada en lo conducente al instrumento de planeación correspondiente, así como en el Anexo de Participación.
                                </p>
                            @elseif( $cedula->status > 100 && isset($instrumento->descripcion) && $instrumento->descripcion == 'PGD')
                                <p>
                                   Se informa que derivado de la valoración técnica y jurídica realizada a la Recomendación/Propuesta en el Proceso de la Consulta Indígena, la misma será integrada en lo conducente al Programa General de Ordenamiento Territorial, así como en el Anexo de Participación.
                                </p>
                            @elseif( $cedula->status > 100 && isset($instrumento->descripcion) && $instrumento->descripcion == 'PGOT')
                                <p>
                                    Se informa que derivado de la valoración técnica y jurídica realizada a la Recomendación/Propuesta en el Proceso de la Consulta Indígena, la misma será integrada en lo conducente al Programa General de Ordenamiento Territorial, así como en el Anexo de Participación.
                                </p>
                            @endif
                        </td>
                        <td class="text-center seguimiento-folios">
                            <button class="edit-item-btn" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            &nbsp;&nbsp;
                            
                            <a href="{{ route('consulta_indigena.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                <i class="fa-solid fa-file-pdf"></i>
                                <!-- Descargar como PDF -->
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>

            <div class="noresult" style="display: none">
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">We've searched more than 150+ Tickets We did
                        not find any Tickets for you search.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 offset-md-1">
        @if( sizeof($archivos) > 0 )
        <h2 class="text-center">ARCHIVOS</h2>
        <div class="row pb-3">
            @foreach ($archivos as $archivo)
            <div class="col-md-3">
                <div class="card">
                    @if( substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'jpg'
                    || substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'png'
                    || substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) == 'jpeg')
                        <img src="{{ asset('storage/'.$archivo->file_path) }}" class="card-img-top">
                    @else
                        <img src="https://via.placeholder.com/288x180.png/bc955c/fff?text={{ substr( $archivo->file_path , strrpos( $archivo->file_path ,".")+1, strlen( $archivo->file_path )) }}" class="card-img-top">
                    @endif
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DETALLE CEDULA FOLIO:#{{ $cedula->folio }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">DATOS DEL ENLACE</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>
                                    <strong>FOLIO:</strong>
                                    <br>
                                    {{ isset($cedula->folio) ? $cedula->folio : null }}
                                </td>
                                <td>
                                    <strong>Tipo Consulta:</strong>
                                    <br>
                                    {{ isset($cedula->tipoConsulta) ? $cedula->tipoConsulta : null }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <strong>NOMBRE COMPLETO:</strong>
                                    <br>
                                    {{ isset($cedula->nombreCompleto) ? $cedula->nombreCompleto : null }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Correo Electrónico:</strong>
                                    <br>
                                    {{ isset($cedula->correo) ? $cedula->correo : null }}
                                </td>
                                <td>
                                    <strong>Telefono:</strong>
                                    <br>
                                    {{ isset($cedula->telefono) ? $cedula->telefono : null }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>¿Se tienen datos de quien participa?</strong>
                                    <br>
                                    {{ isset($cedula->tieneDatosParticipante) ? $cedula->tieneDatosParticipante : null }}
                                </td>
                                <td>
                                    <strong>¿Es representante?</strong>
                                    <br>
                                    {{ isset($cedula->esRepresentante) ? $cedula->esRepresentante : null }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>AUTORIDAD REPRESENTATIVA</strong>
                                    <br>
                                    {{ isset($cedula->tipoAutoridad) ? $cedula->tipoAutoridad : null }}
                                </td>
                                <td>
                                    <strong>Nombre:</strong>
                                    <br>
                                    {{ isset($cedula->nombrePuebloComunidad) ? $cedula->nombrePuebloComunidad : null }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Tipo Organizacion:</strong>
                                    <br>
                                    {{ isset($cedula->tipoOrganizacion) ? $cedula->tipoOrganizacion : null }}
                                </td>
                                <td>
                                    <strong>Nombre Organizacion:</strong>
                                    <br>
                                    {{ isset($cedula->nombreOrganizacion) ? $cedula->nombreOrganizacion : null }}
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
                                    {{ isset($cedula->nombre) ? $cedula->nombre : null }}
                                </td>
                                <td>
                                    <strong>Primer Apellido</strong>
                                    <br>
                                    {{ isset($cedula->primerApellido) ? $cedula->primerApellido : null }}
                                </td>
                                <td>
                                    <strong>Segundo Apellido</strong>
                                    <br>
                                    {{ isset($cedula->segundoApellido) ? $cedula->segundoApellido : null }}
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
                                    {{ isset($cedula->celular) ? $cedula->celular : null }}
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
                                    {{ isset($cedula->numExterior) ? $cedula->numExterior : null }}
                                </td>
                                <td>
                                    <strong>Numero Interior</strong>
                                    <br>
                                    {{ isset($cedula->numInterior) ? $cedula->numInterior : null }}
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
                                    <strong>FORMA DE PARTICIPACIÓN:</strong>
                                    <br>
                                    @if( isset($cedula->tipoParticipacion) )
                                        {{ isset($cedula->tipoParticipacion) ? $cedula->tipoParticipacion : null }}
                                    @elseif( isset($cedula->participacionOtro) )
                                        {{ isset($cedula->participacionOtro) ? $cedula->participacionOtro : null }}
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
                                    {{ isset($cedula->nombreActividad) ? $cedula->nombreActividad : null }}
                                </td>
                                <td style="text-align: center;">
                                    <strong>FECHA:</strong>
                                    <br>
                                    {{ isset($cedula->fechaActividad) ? $cedula->fechaActividad : null }}
                                </td>
                                <td style="text-align: center;">
                                    <strong>LUGAR:</strong>
                                    <br>
                                    {{ isset($cedula->lugarActividad) ? $cedula->lugarActividad : null }}
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
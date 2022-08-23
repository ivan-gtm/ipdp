@extends('layouts.admin')
@section('title', 'Valoración Técnica')
@section('modulo_titulo', 'Valoración Técnica')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="ticketsList">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Folios por analizar</h5>
                    <div class="flex-shrink-0 d-none">
                        <input type="text" class="btn btn-danger add-btn" placeholder="Buscar por nombre, razon, numero">
                        <button class="btn btn-soft-danger" onclick="deleteMultiple()">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive table-card mb-4">
                    <table class="table align-middle table-nowrap mb-0" id="ticketTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Folio<br>Solicitud</th>
                                <th>Origen<br>Solicitud</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Tipo</th>
                                <th>Registrado por</th>
                                <th>Situación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all" id="ticket-list-data">
                            @foreach ($cedulas as $cedula)
                            <tr>
                                <td>
                                    {{ $cedula->id }}
                                </td>
                                <td>
                                    {{ $cedula->folio }}
                                </td>
                                <td>
                                    @if( $cedula->origen == 'publica' )
                                    <span class="badge bg-info text-uppercase">Pública</span>
                                    @else
                                    <span class="badge bg-dark text-uppercase">Indigena</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->created_at }}
                                </td>
                                <td class="text-center">
                                    @if( $cedula->tipo == 'formato_interno' )
                                    <span class="badge bg-success text-uppercase" style="background-color: #9f2442 !important;">FORMATO INTERNO</span>
                                    @elseif( $cedula->tipo == 'cedula' )
                                    <span class="badge bg-success text-uppercase" style="background-color: #bc955c !important;">
                                        CEDULA
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->nombre.' '.$cedula->primer_apellido }}
                                </td>
                                <td>
                                    @if( $cedula->status == 2)
                                    <span class="badge bg-success text-uppercase">Pendiente Valoración Técnica</span>
                                    @elseif( $cedula->status == 102)
                                    <span class="badge bg-danger text-uppercase">Solicitud Rechazada</span>
                                    @endif
                                </td>
                                <td class="create_date">
                                    <ul class="panel-acciones">
                                        <li>
                                            @if( $cedula->tipo == 'formato_interno' )
                                            <a class="edit-item-btn" href="{{ route('administracion.detalleFormatoInterno',[
                                                                            'folio' => $cedula->folio
                                                                        ]) }}">
                                                <i class="fa-solid fa-folder-plus"></i>
                                                <!-- Detalles -->
                                            </a>
                                            @elseif( $cedula->tipo == 'cedula' )
                                            <a class="edit-item-btn" href="{{ route('administracion.detalleConsulta',[
                                                                            'folio' => $cedula->folio
                                                                        ]) }}">
                                                <i class="fa-solid fa-folder-plus"></i>
                                                <!-- Detalles -->
                                            </a>
                                            @endif

                                        </li>
                                        <li>
                                            @if( $cedula->tipo == 'formato_interno' )
                                            <a href="{{ route('consulta_indigena.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <!-- Descargar como PDF -->
                                            </a>
                                            @elseif( $cedula->tipo == 'cedula' )
                                            <a href="{{ route('cedula.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <!-- Descargar como PDF -->
                                            </a>
                                            @endif
                                        </li>
                                        @if( $cedula->status == 2)
                                        <li>
                                            <button type="button" class="edit-item-btn" data-tipo-documento="{{ $cedula->tipo }}" data-documento-id="{{ $cedula->id }}" onclick="aprobarSolicitudTecnica( this )">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <!-- Aprobar -->
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="remove-item-btn" onclick="actualizarFolioIdRechazo({{ $cedula->id }})" data-bs-toggle="modal" data-bs-target="#rechazoModal">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                                <!-- Rechazar -->
                                            </button>
                                        </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="noresult" style="display: none">
                        <div class="text-center">
                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                            <h5 class="mt-2">Sorry! No Result Found</h5>
                            <p class="text-muted mb-0">We've searched more than 150+ Tickets We did
                                not find any Tickets for you search.</p>
                        </div>
                    </div>
                </div>

                @if( $cedulas->hasPages() )
                <div class="d-flex justify-content-end mt-2">
                    <div class="pagination-wrap hstack gap-2" style="display: flex;">
                        @if( $cedulas->onFirstPage() == false)
                        <a class="page-item pagination-prev disabled" href="{{ $cedulas->previousPageUrl() }}">
                            Anterior
                        </a>
                        @endif
                        <ul class="pagination listjs-pagination mb-0">
                            @for ($i = 1; $i <= $page_number; $i++) @if( $cedulas->currentPage() ==
                                $i)
                                <li class="active">
                                    @else
                                <li>
                                    @endif
                                    <a class="page" href="{{ $cedulas->url($i) }}" data-i="1" data-page="8">
                                        {{ $i }}
                                    </a>
                                </li>
                                @endfor
                        </ul>
                        @if( $cedulas->hasMorePages() )
                        <a class="page-item pagination-next" href="{{ $cedulas->nextPageUrl() }}">
                            Siguiente
                        </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endsection

@section('modales')
<!-- Modal -->
<div class="modal fade" id="rechazoModal" tabindex="-1" aria-labelledby="rechazoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rechazoModalLabel">Rechazar Folio "342344"
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Escriba una breve descripción, con el motivo del rechazo:
                <input type="hidden" name="folio_id_rechazo" id="folio_id_rechazo">
                <textarea class="form-control" name="motivo_rechazo" id="motivo_rechazo" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="rechazarSolicitud()">Enviar Rechazo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEvaluacionTecnica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td colspan="2" style="background-color: #9f2442; color: white;">
                                    SELECCIONE TIPO DE INSTRUMENTO
                                </td>
                            </tr>
                            @foreach ($instrumentos as $instrumento)
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input" type="radio" name="evaluacion_instrumento" id="instrumento{{ $instrumento['id'] }}" value="{{ $instrumento['id'] }}">
                                </td>
                                <td>
                                    <label class="form-check-label" for="instrumento{{ $instrumento['id'] }}">
                                        {{ $instrumento['descripcion'] }}
                                    </label>
                                </td>

                            </tr>
                            @endforeach
                        </table>
                        <table class="table evaluacionParametros">
                            @foreach ($parametros as $categoria)
                            <tr>
                                <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="background-color: #9f2442; color: white;">
                                    {{ $categoria['categoria']['descripcion'] }}
                                </td>
                            </tr>
                            @foreach( $categoria['parametros'] as $prm )
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input" type="radio" name="cat{{ $categoria['categoria']['id'] }}" data-categoria-id="{{ $categoria['categoria']['id'] }}" data-parametro-id="{{ $prm['id'] }}" id="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}" value="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}">
                                </td>
                                <td>
                                    <label class="form-check-label" for="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}">
                                        {{ $prm['descripcion'] }}
                                    </label>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-12">
                        <strong>OBSERVACIONES DE VALORACIÓN TÉCNICA:</strong>
                        <input type="hidden" name="folio_id" id="folio_id">
                        <input type="hidden" name="tipoDocumento" id="tipoDocumento">
                        <textarea class="form-control" name="observacionesValoracion" id="observacionesValoracion" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarEvaluacionAnalisis()">Aceptar
                    Consulta</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const modalEvaluacionTecnica = new bootstrap.Modal(document.getElementById('modalEvaluacionTecnica'));
    const rechazoModal = new bootstrap.Modal(document.getElementById('rechazoModal'));

    function aprobarSolicitudTecnica(elemento) {
        $('#folio_id').val($(elemento).attr("data-documento-id"));
        $('#tipoDocumento').val($(elemento).attr("data-tipo-documento"));
        modalEvaluacionTecnica.show();
    }

    function actualizarFolioIdRechazo(folio_id) {
        $('#folio_id_rechazo').val(folio_id);
    }

    function guardarEvaluacionAnalisis() {
        prm = obtenerParametros();

        requestBody = {
            "folio_id": $('#folio_id').val(),
            "tipo_documento": $('#tipoDocumento').val(),
            "instrumento": $("input[name='evaluacion_instrumento']:checked").val(),
            "observaciones": $('#observacionesValoracion').val(),
            "parametros": prm
        };

        // console.log( respuesta );

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.guardarEvaluacionTecnica') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(data, textStatus, jqXHR) {
                modalEvaluacionTecnica.hide();
                location.reload();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST").show();
            });
    }

    function limpiarFormularioEvaluacion() {

        $('#numero_folio').val("");
        $('#observacionesValoracion').val("");
        $('input:radio:checked').each(function(index) {
            $(this).prop("checked", false);
        });
    }

    function obtenerParametros() {
        parametros = [];

        $('.evaluacionParametros input:radio:checked').each(function(index) {
            console.log(index + ": " + $(this).val());
            parametros.push($(this).val());
        });

        return parametros;
    }

    function rechazarSolicitud() {
        requestBody = {
            "consulta_id": $('#folio_id_rechazo').val(),
            "motivo_rechazo": $('#motivo_rechazo').val()
        };

        // rechazoModal.show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('administracion.guardarRechazoEvaluacionTecnica') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(data, textStatus, jqXHR) {
                rechazoModal.hide();
                location.reload();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST").show();
            });
    }
</script>
@endsection
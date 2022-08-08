@extends('layouts.admin')
@section('title', 'Gestión de CEDULAS | Análisis')
@section('modulo_titulo', 'Análisis de Propuestas')
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
                                <th>Fecha</th>
                                <th>Tipo</th>
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
                                        <span class="badge bg-dark text-uppercase">Privada</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->created_at }}
                                </td>
                                <td>
                                    <span class="badge bg-success text-uppercase">CEDULA</span>
                                </td>
                                <td>
                                    {{ $cedula->nombre.' '.$cedula->primer_apellido }}
                                </td>
                                <td>
                                    @if( $cedula->status == 1)
                                    <!-- {{ $cedula->status }} -->
                                    <span class="badge bg-success text-uppercase">Pendiente Análisis de propuesta</span>
                                    @elseif( $cedula->status == 101)
                                    <span class="badge bg-danger text-uppercase">Solicitud Rechazada</span>
                                    @endif
                                </td>
                                <td class="create_date">
                                    <ul class="panel-acciones">
                                        <li>
                                            <a class="edit-item-btn" href="{{ route('administracion.detalleConsulta',[
                                                                        'folio' => $cedula->folio
                                                                    ]) }}">
                                                <i class="fa-solid fa-folder-plus"></i>
                                                <!-- Detalles -->
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('cedula.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <!-- Descargar como PDF -->
                                            </a>
                                        </li>
                                        @if( $cedula->status == 1)
                                        <li>
                                            <button type="button" class="edit-item-btn" onclick="aprobarSolicitud( {{ $cedula->id }} )">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <!-- Aprobar -->
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="remove-item-btn" data-bs-toggle="modal" onclick="actualizarFolioIdRechazo({{ $cedula->id }})" data-bs-target="#rechazoModal">
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
    <div class="modal-dialog">
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

<div class="modal fade" id="aprobarSolicitudModal" tabindex="-1" aria-labelledby="aprobarSolicitudModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Aceptar Folio "<span id="noFolioAceptar"></span>"
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" name="aprobarSolicitudId" id="aprobarSolicitudId" value="2">
                    <label for="temasEvaluacion" class="form-label">Seleccione el tema:</label>
                    <select class="form-select" 
                        name="temasEvaluacion" id="temasEvaluacion"
                        onchange="obtenerSubTemasEvaluacion( this )">
                        @foreach ($temas as $tema)
                        <option value="{{ $tema['id'] }}">{{ $tema['descripcion'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subtemasEvaluacion" class="form-label">Seleccione el tema:</label>
                    <select class="form-select" aria-label="Default select example" name="subtemasEvaluacion" id="subtemasEvaluacion" disabled></select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="guardarAprobacion()">Aceptar Consulta</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const aprobarSolicitudModal = new bootstrap.Modal(document.getElementById('aprobarSolicitudModal'));
    const rechazoModal = new bootstrap.Modal(document.getElementById('rechazoModal'));

    function aprobarSolicitud( consulta_id ){
        aprobarSolicitudModal.show();
        $('#aprobarSolicitudId').val( consulta_id );
    }

    function guardarAprobacion() {
        requestBody = {
            "consulta_id": $('#aprobarSolicitudId').val(),
            "tema_evaluacion": $('#temasEvaluacion').val(),
            "subtema_evaluacion": $('#subtemasEvaluacion').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.guardarEvaluacionAnalisis') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(data, textStatus, jqXHR) {
                console.log(data);
                console.log("COMPLETE");
                location.reload();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST").show();
            });
    }

    function actualizarFolioIdRechazo(folio_id) {
        $('#folio_id_rechazo').val(folio_id);
    }

    function obtenerSubTemasEvaluacion( element ) {
        $('#subtemasEvaluacion').find('option').remove().end();
        // console.log("dasdas");
        var tema_id = $(element).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('administracion.obtenerSubtemasAnalisis',['tema_id' => null]) }}" + "/" + tema_id,
                method: "GET",
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(subtemas, textStatus, jqXHR) {
                
                subtemasObj = JSON.parse(subtemas);
                var numero_de_subtemas = subtemasObj.length;
                console.log("numero_de_subtemas");
                console.log(numero_de_subtemas);

                for (let index = 0; index < numero_de_subtemas; index++) {
                    const subtemaObj = subtemasObj[index];
                    // console.log( subtemaObj.id );
                    agregarOpcion(subtemaObj.id, subtemaObj.descripcion);
                }
                $('#subtemasEvaluacion').removeAttr("disabled");

            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST").show();
            });
    }

    function agregarOpcion(valueParameter, descriptionParameter) {
        $('#subtemasEvaluacion').append($('<option>', {
            value: valueParameter,
            text: descriptionParameter
        }));
    }

    function rechazarSolicitud() {
        
        requestBody = {
            "consulta_id": $('#aprobarSolicitudId').val(),
            "consulta_id": $('#folio_id_rechazo').val(),
            "motivo_rechazo": $('#motivo_rechazo').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('administracion.guardarRechazoAnalisisSolicitud') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(data, textStatus, jqXHR) {
                // console.log(data);
                // console.log("COMPLETE");
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
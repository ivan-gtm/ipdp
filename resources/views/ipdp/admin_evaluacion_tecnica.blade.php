@extends('layouts.admin')
@section('title', 'Evaluacion Tecnica')
@section('modulo_titulo', 'Evaluacion Tecnica')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<div class="table-responsive table-card mb-4">
    <table class="table align-middle table-nowrap mb-0" id="ticketTable">
        <thead>
            <tr>
                <th>No.</th>
                <th>Folio<br>Solicitud</th>
                <th>Fecha</th>
                <th>Tipo</th>
                <th>Registrado por</th>
                <th>Estado de la solicitud</th>
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
                    {{ $cedula->created_at }}
                </td>
                <td>
                    <span class="badge bg-success text-uppercase">CEDULA</span>
                </td>
                <td>
                    {{ $cedula->nombre.' '.$cedula->primer_apellido }}
                </td>
                <td>
                    <span class="badge badge-soft-warning text-uppercase">
                        {{ $cedula->status }}
                    </span>
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
                            <a href="{{ route('cedula.pdf',[
                                                                            'numero_folio' => $cedula->folio
                                                                        ]) }}" class="edit-item-btn" download>
                                <i class="fa-solid fa-file-pdf"></i>
                                <!-- Descargar como PDF -->
                            </a>
                        </li>
                        <li>
                            <button type="button" class="edit-item-btn" onclick="actualizarFolioId({{ $cedula->id }})" data-bs-toggle="modal" data-bs-target="#modalEvaluacionTecnica">
                                <i class="fa-solid fa-circle-check"></i>
                                <!-- Aprobar -->
                            </button>
                        </li>
                        <li>
                            <button type="button" class="remove-item-btn" data-bs-toggle="modal" data-bs-target="#rechazoModal">
                                <i class="fa-solid fa-circle-xmark"></i>
                                <!-- Rechazar -->
                            </button>
                        </li>
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
                <textarea class="form-control" name="motivo_rechazo" id="" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Enviar Rechazo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEvaluacionTecnica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
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
                        <input class="d-none" type="text" name="folio_id" id="folio_id">
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

    function actualizarFolioId(folio_id) {
        $('#folio_id').val(folio_id);
    }

    function guardarEvaluacionAnalisis() {
        prm = obtenerParametros();

        requestBody = {
            "folio_id": $('#folio_id').val(),
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
                contentType: 'application/json; charset=utf-8',
                dataType: 'json'
            })
            .done(function(data, textStatus, jqXHR) {
                location.reload();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
                $("#status").text("FAIL REQUEST").show();
            });

        console.log("finalice evaluacion");
        modalEvaluacionTecnica.hide();
        location.reload();
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

        $('input:radio:checked').each(function(index) {
            console.log(index + ": " + $(this).val());
            parametros.push($(this).val());
        });

        return parametros;
    }
</script>
@endsection
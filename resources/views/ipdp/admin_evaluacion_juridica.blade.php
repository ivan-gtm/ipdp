@extends('layouts.admin')
@section('title', 'Gestión de CEDULAS | Analisis')
@section('modulo_titulo', 'Gestión de CEDULAS | Analisis')
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
                                        <!-- {{ $cedula->status }} -->
                                        Pendiente Valoración Júridica
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
                                            <button type="button" class="edit-item-btn" onclick="obtenerEvaluacion({{ $cedula->id }})">
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

<div class="modal fade" id="modalEvaluacionJuridica" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="folio_id" id="folio_id" value="">
                    <div class="col-md-12">
                        <table class="table" id="evaluacion-juridica">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <strong>OBSERVACIONES DE VALORACIÓN TÉCNICA:</strong>
                        <p id="observaciones_tecnica"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary" onclick="aprobarSolicitudJuridica()">PROCEDENTE</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const modalEvaluacionJuridica = new bootstrap.Modal(document.getElementById('modalEvaluacionJuridica'));
    const rechazoModal = new bootstrap.Modal(document.getElementById('rechazoModal'));

    function setTitulo(titulo) {
        $("table#evaluacion-juridica>tbody").append(getTituloHTML(titulo));
    }

    function getTituloHTML(titulo) {
        return '<tr><td colspan="2" style="background-color: #9f2442; color: white;">{titulo}</td></tr>'.replace("{titulo}", titulo);
    }

    function setParametro(parametro) {
        $("table#evaluacion-juridica>tbody").append(getParametroHTML(parametro));
    }

    function getParametroHTML(parametro) {
        return '<tr><td>{parametro}</td></tr>'.replace("{parametro}", parametro);
    }

    function setEspacio() {
        $("table#evaluacion-juridica>tbody").append('<tr><td colspan="2">&nbsp;</td></tr>');
    }

    function obtenerEvaluacion(consulta_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.obtenerEvaluacionJuridica',['consulta_id' => null]) }}/" + consulta_id,
                method: "GET",
                contentType: 'application/json; charset=utf-8',
                dataType: 'json'
            })
            .done(function(result, textStatus, jqXHR) {
                console.log("consulta_id");
                console.log(consulta_id);
                $("#folio_id").val(consulta_id);
                $("#observaciones_tecnica").text("");
                $("#observaciones_juridica").text("");
                $("table#evaluacion-juridica>tbody").html("");
                evaluacion = result;

                // console.log(evaluacion);
                $("#observaciones_tecnica").text(evaluacion.comentario);
                var numero_de_categorias = Object.keys(evaluacion.parametros).length;
                for (let index = 1; index <= numero_de_categorias; index++) {
                    const elemento = evaluacion.parametros[index];
                    setTitulo(elemento.categoria.descripcion);

                    var numero_de_parametros = Object.keys(elemento.parametros).length;
                    console.log("numero_de_parametros");
                    console.log(numero_de_parametros);

                    for (let i = 0; i < numero_de_parametros; i++) {
                        // console.log( elemento.parametros[i].descripcion );
                        setParametro(elemento.parametros[i].descripcion);
                    }
                }

                modalEvaluacionJuridica.show();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
            });
    }

    function aprobarSolicitudJuridica() {
        var consulta_id = $("#folio_id").val();
        var requestBody = {
            "consulta_id": consulta_id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.guardarEvaluacionJuridica') }}/",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(result, textStatus, jqXHR) {
                modalEvaluacionJuridica.hide();
                location.reload();
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: " + textStatus);
                }
            });
    }

    function actualizarFolioIdRechazo(folio_id) {
        $('#folio_id_rechazo').val(folio_id);
    }

    function rechazarSolicitud() {
        requestBody = {
            "consulta_id": $('#folio_id_rechazo').val(),
            "motivo_rechazo": $('#motivo_rechazo').val()
        };
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('administracion.guardarRechazoEvaluacionJuridica') }}",
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
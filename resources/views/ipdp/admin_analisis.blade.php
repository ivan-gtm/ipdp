@extends('layouts.admin')
@section('title', 'Gestión de CEDULAS | Análisis')
@section('modulo_titulo', 'Análisis de Propuestas')
@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="GET" action="{{route('administracion.evaluacionAnalisisBuscar')}}">
            <div class="row" style="background-color: rgb(236, 236, 236); padding: 16px 0px; border-radius: 10px; margin: 10px;">
                <div class="col-2 text-center">
                    B&uacute;squeda por folio      
                </div>
                <div class="col-3 text-center">
                    @if( isset($numero_folio) )
                        <input name="numero_folio" class="form-control" type="number" value="{{ $numero_folio }}" placeholder="Ingresa el n&uacute;mero de folio">
                    @else
                        <input name="numero_folio" class="form-control" type="number" placeholder="Ingresa el n&uacute;mero de folio">
                    @endif
                </div>
                <div class="col-1 text-center">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary" type="button">CONSULTAR</button>
                    </div>
                </div>
            </div>
        </form>        
    </div>
</div>

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
                                    @if( $cedula->tipo_documento == 'cedula' || ( $cedula->tipo_documento == 'formato_interno' && $cedula->tipo_consulta == 'CONSULTA PUBLICA') )
                                    <span class="badge bg-info text-uppercase">Consulta Pública</span>
                                    @elseif( $cedula->tipo_documento == 'formato_interno' && $cedula->tipo_consulta == 'CONSULTA INDÍGENA' )
                                    <span class="badge bg-dark text-uppercase">Consulta Indigena</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->created_at }}
                                </td>
                                <td class="text-center">
                                    @if( $cedula->tipo_documento == 'formato_interno' )
                                    <span class="badge bg-success text-uppercase" style="background-color: #9f2442 !important;">FORMATO INTERNO</span>
                                    @elseif( $cedula->tipo_documento == 'cedula' )
                                    <span class="badge bg-success text-uppercase" style="background-color: #bc955c !important;">
                                        CEDULA
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->nombre.' '.$cedula->primer_apellido }}
                                </td>
                                <td>
                                    @if( $cedula->status == 1)
                                    <span class="badge bg-success text-uppercase">Pendiente Análisis de propuesta</span>
                                    @elseif( $cedula->status == 101)
                                    <span class="badge bg-danger text-uppercase">Solicitud Rechazada</span>
                                    @endif
                                </td>
                                <td class="create_date">
                                    <ul class="panel-acciones">
                                        <li>
                                            @if( $cedula->tipo_documento == 'formato_interno' )
                                            <a class="edit-item-btn" href="{{ route('administracion.detalleFormatoInterno',[
                                                                            'folio' => $cedula->folio
                                                                        ]) }}">
                                                <i class="fa-solid fa-folder-plus"></i>
                                                <!-- Detalles -->
                                            </a>
                                            @elseif( $cedula->tipo_documento == 'cedula' )
                                            <a class="edit-item-btn" href="{{ route('administracion.detalleConsulta',[
                                                                            'folio' => $cedula->folio
                                                                        ]) }}">
                                                <i class="fa-solid fa-folder-plus"></i>
                                                <!-- Detalles -->
                                            </a>
                                            @endif

                                        </li>
                                        <li>
                                            @if( $cedula->tipo_documento == 'formato_interno' )
                                            <a href="{{ route('consulta_indigena.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <!-- Descargar como PDF -->
                                            </a>
                                            @elseif( $cedula->tipo_documento == 'cedula' )
                                            <a href="{{ route('cedula.pdf',['numero_folio' => $cedula->folio]) }}" class="edit-item-btn" download>
                                                <i class="fa-solid fa-file-pdf"></i>
                                                <!-- Descargar como PDF -->
                                            </a>
                                            @endif
                                        </li>
                                        @if( $cedula->status == 1)
                                        <li>
                                            <button type="button" class="edit-item-btn" data-tipo-documento="{{ $cedula->tipo_documento }}" data-documento-id="{{ $cedula->id }}" onclick="aprobarSolicitud( this )">
                                                <i class="fa-solid fa-circle-check"></i>
                                                <!-- Aprobar -->
                                            </button>
                                        </li>
                                        <li>
                                            <button type="button" class="remove-item-btn" data-tipo-documento="{{ $cedula->tipo_documento }}" data-documento-id="{{ $cedula->id }}" onclick="mostrarModalRechazo( this )">
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
                            @for($i = $first_page; $i <= $last_page; $i++) 
                                @if( $cedulas->currentPage() == $i)
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
                <h5 class="modal-title" id="rechazoModalLabel">Rechazar Folio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" name="documentoIdRechazado" id="documentoIdRechazado" value="0">
                    <input type="hidden" name="tipoDocumentoRechazado" id="tipoDocumentoRechazado">

                    <table class="table evaluacionRechazoTable">
                        <tr>
                            <td colspan="2" style="background-color: #9f2442; color: white;">
                                Seleccione el tema
                            </td>
                        </tr>
                        @foreach ($temas as $tema)
                            <tr>
                                <td class="text-center">
                                    <input class="form-check-input" type="checkbox" name="temasRechazo" data-categoria-id="{{ $tema['id'] }}" id="temaRechazo{{ $tema['id'] }}" value="{{ $tema['id'] }}">
                                </td>
                                <td>
                                    <label class="form-check-label" for="temaRechazo{{ $tema['id'] }}">
                                        {{ $tema['descripcion'] }}
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mb-3">
                    <table class="table" id="subtemasRechazo">
                        <tr>
                            <td colspan="2" style="background-color: #9f2442; color: white;">
                                Seleccione el subtema
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="mb-3">
                    Escriba una breve descripción, con el motivo del rechazo:
                    <textarea class="form-control" name="motivo_rechazo" id="motivo_rechazo" rows="10"></textarea>
                </div>
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
                <h5 class="modal-title">Aceptar Folio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="hidden" name="aprobarSolicitudId" id="aprobarSolicitudId" value="0">
                    <input type="hidden" name="tipoDocumento" id="tipoDocumento">
                    
                    <table class="table evaluacionParametros">
                        <tr>
                            <td colspan="2" style="background-color: #9f2442; color: white;">
                                Seleccione el tema
                            </td>
                        </tr>
                        @foreach ($temas as $tema)
                        <tr>
                            <td class="text-center">
                                <input class="form-check-input" type="checkbox" name="temasAprobacion" data-categoria-id="{{ $tema['id'] }}" id="tema{{ $tema['id'] }}" value="{{ $tema['id'] }}">
                            </td>
                            <td>
                                <label class="form-check-label" for="tema{{ $tema['id'] }}">
                                    {{ $tema['descripcion'] }}
                                </label>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <div class="mb-3">
                    <table class="table" id="subtemasEvaluacion">
                        <tr>
                            <td colspan="2" style="background-color: #9f2442; color: white;">
                                Seleccione el subtema
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="mb-3">
                    <label for="txtObservaciones" class="form-label">Recomendaciones:</label>
                    <textarea class="form-control" name="txtObservaciones" id="txtObservaciones" cols="30" rows="10"></textarea>
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

    var arrayTemasAprobacion = [];
    $('input[name="temasAprobacion"]').click(function () {
        
        arrayTemasAprobacion = [];
        $('[name="temasAprobacion"]:checked').each(function () {
            arrayTemasAprobacion.push( $(this).val());
        });

        $("table#subtemasEvaluacion>tbody").html("");
        var temas_ids = arrayTemasAprobacion.join();
        obtenerSubTemasEvaluacion(temas_ids, "aprobacion")
    });
    
    
    var arrayTemasRechazo = [];
    $('input[name="temasRechazo"]').click(function () {
        
        arrayTemasRechazo = [];
        $('[name="temasRechazo"]:checked').each(function () {
            arrayTemasRechazo.push( $(this).val());
        });

        $("table#subtemasRechazo>tbody").html("");
        var temas_ids = arrayTemasRechazo.join();
        obtenerSubTemasEvaluacion(temas_ids, "rechazo")
    });

    function setTitulo(titulo, flujo) {
        if( flujo == 'aprobacion' ){
            $("table#subtemasEvaluacion>tbody").append(getTituloHTML(titulo));
        } else {
            $("table#subtemasRechazo>tbody").append(getTituloHTML(titulo));
        }
    }

    function getTituloHTML(titulo) {
        return '<tr><td colspan="2" style="background-color: #9f2442; color: white;">{titulo}</td></tr>'.replace("{titulo}", titulo);
    }
    
    function setParametro( subtema_id, descripcion, flujo ) {
        if( flujo == 'aprobacion' ){
            table_selector = "table#subtemasEvaluacion>tbody";
        } else {
            table_selector = "table#subtemasRechazo>tbody";
        }
        $(table_selector).append( getParametroHTML( subtema_id, descripcion, flujo ) );
    }

    function getParametroHTML( subtema_id, descripcion, flujo ) {
        id_elemento = flujo + subtema_id;
        if( flujo == 'aprobacion' ){
            checkbox_selector = "subtemasAprobacion";
        } else {
            checkbox_selector = "subtemasRechazo";
        }
        return '<tr><td><input class="form-check-input" type="checkbox" name="'+ checkbox_selector +'" data-subtema-id="{subtemaid}" id="subtema{id_elemento}" value="{subtemaid}"></td><td><label class="form-check-label" for="subtema{id_elemento}">{descripcion_subtema}</label></td></tr>'.replaceAll("{subtemaid}", subtema_id).replaceAll("{descripcion_subtema}", descripcion).replaceAll("{id_elemento}", descripcion);
    }

    function aprobarSolicitud(elemento) {
        aprobarSolicitudModal.show();
        $('#aprobarSolicitudId').val($(elemento).attr("data-documento-id"));
        $('#tipoDocumento').val($(elemento).attr("data-tipo-documento"));
    }

    function mostrarModalRechazo(elemento) {
        console.log($(elemento).attr("data-documento-id"));
        $('#documentoIdRechazado').val($(elemento).attr("data-documento-id"));
        $('#tipoDocumentoRechazado').val($(elemento).attr("data-tipo-documento"));
        rechazoModal.show();
    }

    function obtenerEvaludacionTemas(){
        var arrTemas = [];
        $('[name="temasAprobacion"]:checked').each(function () {
            arrTemas.push( $(this).val());
        });
        return arrTemas.join();
    }
    
    function obtenerEvaludacionSubtemas(){
        var arrSubtemas = [];
        $('[name="subtemasAprobacion"]:checked').each(function () {
            arrSubtemas.push( $(this).val());
        });
        return arrSubtemas.join();
    }

    function guardarAprobacion() {
        requestBody = {
            "consulta_id": $('#aprobarSolicitudId').val(),
            "tema_evaluacion": obtenerEvaludacionTemas(),
            "subtema_evaluacion": obtenerEvaludacionSubtemas(),
            "tipo_documento": $('#tipoDocumento').val(),
            "observaciones": $('#txtObservaciones').val()
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

    function obtenerSubTemasEvaluacion(temas_ids, flujo) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('administracion.obtenerSubtemasAnalisis') }}" + "?temas_ids=" + temas_ids,
                method: "GET",
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(subtemas, textStatus, jqXHR) {
                $("table#subtemasEvaluacion>tbody").html("");
                subtemasObj = JSON.parse(subtemas);
                
                var numero_de_subtemas = subtemasObj.length;
                
                setTitulo( "Seleccione el subtema", flujo );
                
                for (let index = 0; index < numero_de_subtemas; index++) {
                    const subtemaObj = subtemasObj[index];
                    setParametro(subtemaObj.id, subtemaObj.descripcion, flujo);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                if (console && console.log) {
                    console.log("La solicitud a fallado: ");
                }
            });
    }

    function rechazarSolicitud(elemento) {

        requestBody = {
            "consulta_id": $('#documentoIdRechazado').val(),
            "tipo_documento": $('#tipoDocumentoRechazado').val(),
            "tema_evaluacion": $('#temaRechazo').val(),
            "subtema_evaluacion": $('#subtemaRechazo').val(),
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
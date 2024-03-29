@extends('layouts.admin')
@section('title', 'Gestión de CEDULAS | Análisis')
@section('modulo_titulo', 'INTEGRACIÓN')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="GET" action="{{route('administracion.evaluacionIntegracionBuscar')}}">
            <div class="row" style="background-color: rgb(236, 236, 236); padding: 16px 0px; border-radius: 10px; margin: 10px 0px;">
                <div class="col-6 text-left">
                    B&uacute;squeda por folio<br>
                    <div class="row">
                        <div class="col-8">
                            @if( isset($numero_folio) )
                                <input name="numero_folio" class="form-control" type="number" value="{{ $numero_folio }}" placeholder="Ingresa el n&uacute;mero de folio">
                            @else
                                <input name="numero_folio" class="form-control" type="number" placeholder="Ingresa el n&uacute;mero de folio">
                            @endif
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary" type="button">CONSULTAR</button>
                        </div>
                    </div>
                    
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Excel de integración
                                </div>
                                <div class="col-12 text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.formatoInterno','4-104') }}" class="btn btn-success" download>
                                                <i class="fa-regular fa-file-excel"></i>
                                                FORMATO INTERNO
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.cedulas','4-104') }}" class="btn btn-success" download>
                                                <i class="fa-regular fa-file-excel"></i>
                                                CONSULTA PUBLICA
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 text-center">
                                    Historico Completo
                                </div>
                                <div class="col-12 text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.formatoInterno','1-2-3-4-5-100-101-102-103-104-105') }}" class="btn btn-success" download>
                                                <i class="fa-regular fa-file-excel"></i>
                                                FORMATO INTERNO
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.cedulas','1-2-3-4-5-100-101-102-103-104-105') }}" class="btn btn-success" download>
                                                <i class="fa-regular fa-file-excel"></i>
                                                CONSULTA PUBLICA
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <th>Dirigido al instrumento</th>
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
                                    <!-- {{ $cedula->status }} -->
                                    <!-- {{ $cedula->evaluador_pgot_fk }} -->
                                    <!-- {{ $cedula->instrumento }} -->
                                    @if( $rol_usuario == 'integracion_pgd' && $cedula->status == 4 && ($cedula->instrumento == 'PGD' || $cedula->instrumento == 'PGD+PGOT') && $cedula->evaluador_pgd_fk == "")
                                        <span class="badge badge-soft-warning text-uppercase">
                                            Pendiente de evaluación PDG
                                        </span>
                                    @elseif( $rol_usuario == 'integracion_pgot' && $cedula->status == 4 && ($cedula->instrumento == 'PGOT' || $cedula->instrumento == 'PGD+PGOT') && $cedula->evaluador_pgot_fk == "")
                                        <span class="badge badge-soft-warning text-uppercase">
                                            Pendiente de evaluación PGOT
                                        </span>
                                    @elseif( $cedula->status == 104)
                                        <span class="badge bg-danger text-uppercase">
                                            Solicitud Rechazada por integrador
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{ $cedula->instrumento }}
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
                                        {{-- // 4:: PGOT --}}
                                        {{-- // 5:: PGD  --}}
                                        @if( ( Auth::user()->rol == 'integracion_pgd' && intval($cedula->evaluador_pgd_fk) == 0 ) 
                                            ||
                                            ( Auth::user()->rol == 'integracion_pgot' && intval($cedula->evaluador_pgot_fk) == 0 ) 
                                        )
                                            @if( $cedula->status == 4 || $cedula->status == 103)
                                            <li>
                                                <button type="button" class="edit-item-btn" 
                                                    data-cedula-id="{{ $cedula->id }}" 
                                                    data-cedula-folio="{{ $cedula->folio }}" 
						                            data-tipo-documento="{{ $cedula->tipo }}" 
                                                    onclick="abrirModalEvaluacionIntegracion(this)">

                                                        <i class="fa-solid fa-circle-check"></i>
                                                        <!-- Aprobar -->

                                                </button>
                                            </li>
                                            <li>
                                                <button type="button" class="remove-item-btn" 
                                                    data-bs-toggle="modal" 
                                                    data-cedula-id="{{ $cedula->id }}" 
                                                    data-cedula-folio="{{ $cedula->folio }}" 
                                                    data-tipo-documento="{{ $cedula->tipo }}" 
                                                    onclick="actualizarFolioIdRechazo(this)" 
                                                    data-bs-target="#rechazoModal">
                                                        
                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                        <!-- Rechazar -->

                                                </button>
                                            </li>
                                            @endif
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rechazoModalLabel">Rechazar Folio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Escriba una breve descripción, con el motivo del rechazo:
                <input type="hidden" name="folio_id_rechazo" id="folio_id_rechazo">
                <input type="hidden" name="tipo_documento_rechazo" id="tipo_documento_rechazo">
                <textarea class="form-control" name="motivo_rechazo" id="motivo_rechazo" rows="10"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="rechazarSolicitud()">Enviar Rechazo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEvaluacionJuridica" tabindex="-1" role="dialog" aria-labelledby="aprobarIntegracionModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aprobarIntegracionModal">
                    Evaluación Integración
                    <span id="titulo_modal_aprobacion"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Valoración Técnica:</h4>
                        <table class="table" id="evaluacion-juridica">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <strong>Observaciones Valoración Técnica:</strong>
                        <p id="observaciones_tecnica"></p>
                    </div>
                    <div class="col-12">
                        <h4 class="text-center">INTEGRACIÓN:</h4>
                        <input type="hidden" id="modal_cedula_id" name="modal_cedula_id">
                        <input type="hidden" id="modal_tipo_documento" name="modal_tipo_documento">
                        <table class="table">
                            <tr>
                                <td colspan="2" style="background-color: #9f2442; color: white;">
                                    @if( Auth::check() && Auth::user()->rol == 'integracion_pgot' )
                                        <strong>NUEVA ESTRATEGIA:</strong>
                                    @elseif( Auth::check() && Auth::user()->rol == 'integracion_pgd' )
                                        <strong>NUEVO EJE:</strong>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        
                        <textarea class="form-control" name="eje_estrategia" id="eje_estrategia" rows="6" placeholder="Escriba aqui su propuesta" required></textarea>
                    </div>
                    <div class="col-12">
                        <br>
                        <table class="table">
                            <tr>
                                <td colspan="2" style="background-color: #9f2442; color: white;">
                                    @if( Auth::check() && Auth::user()->rol == 'integracion_pgot' )
                                        <strong>NUEVA LÍNEA DE ACCIÓN:</strong>
                                    @elseif( Auth::check() && Auth::user()->rol == 'integracion_pgd' )
                                        <strong>NUEVO OBJETIVO:</strong>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <textarea class="form-control" name="accion_objetivo" id="accion_objetivo" rows="6" placeholder="Escriba aqui su propuesta" required></textarea>
                    </div>
                    <div class="col-12">
                        <br>
                        <table class="table">
                            <tr>
                                <td colspan="2" style="background-color: #9f2442; color: white;">
                                    <strong>
                                        OBSERVACIONES
                                        @if( Auth::check() && Auth::user()->rol == 'integracion_pgot' )
                                            VALORACIÓN PGOT
                                        @elseif( Auth::check() && Auth::user()->rol == 'integracion_pgd' )
                                            VALORACIÓN PGD
                                        @endif
                                        :</strong>
                                </td>
                            </tr>
                        </table>
                        <textarea class="form-control" name="observacionesValoracion" id="observacionesValoracion" rows="6" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCELAR</button>
                <button type="button" class="btn btn-primary" onclick="aprobarFaseIntegracion()">PROCEDENTE</button>
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

    function obtenerEvaluacion(tipo_documento,documento_id) {
        requestBody = {
            "tipo_documento": tipo_documento,
            "consulta_id": documento_id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.obtenerEvaluacionJuridica') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8'
            })
            .done(function(result, textStatus, jqXHR) {
            
                // $("#folio_id").val( $(element).attr("data-documento-id") );
                // $("#tipo_documento").val( $(element).attr("data-tipo-documento") );
                // $("#observaciones_juridica").text("");

                modalEvaluacionJuridica.show();

                $("#observaciones_tecnica").text("");
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

    function abrirModalEvaluacionIntegracion(element) {
        

        var cedula_id = $(element).attr("data-cedula-id");
        var cedula_folio = $(element).attr("data-cedula-folio");
        var tipo_documento = $(element).attr("data-tipo-documento");
        
        $("span#titulo_modal_aprobacion").text("Folio " + cedula_folio);
        $("#modal_cedula_id").val(cedula_id);
        $("#modal_tipo_documento").val(tipo_documento);
        
        obtenerEvaluacion(tipo_documento,cedula_id);
    }

    function aprobarFaseIntegracion() {

        var consulta_id = $("#modal_cedula_id").val();
        var eje_estrategia = $("#eje_estrategia").val();
        var accion_objetivo = $("#accion_objetivo").val();
        var tipo_documento = $("#modal_tipo_documento").val();
        var observaciones = $("#observacionesValoracion").val();

        var requestBody = {
            "consulta_fk": consulta_id,
            "tipo_documento": tipo_documento,
            "eje_estrategia": eje_estrategia,
            "accion_objetivo": accion_objetivo,
            "observaciones": observaciones
        };

        console.log(requestBody);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('administracion.guardarEvaluacionIntegracion') }}/",
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

    function actualizarFolioIdRechazo(element) {
        var cedula_id = $(element).attr("data-cedula-id");
        var tipo_documento = $(element).attr("data-tipo-documento");
        $('#folio_id_rechazo').val(cedula_id);
        $('#tipo_documento_rechazo').val(tipo_documento);
    }

    function rechazarSolicitud() {
        requestBody = {
            "consulta_id": $('#folio_id_rechazo').val(),
            "motivo_rechazo": $('#motivo_rechazo').val(),
            "tipo_documento": $('#tipo_documento_rechazo').val()
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
                url: "{{ route('administracion.guardarRechazoEvaluacionIntegracion') }}",
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
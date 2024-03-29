@extends('layouts.admin')

@section('title', 'Gestión de CEDULAS | Análisis')
@section('modulo_titulo', 'Recepción de Propuestas')

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form method="GET" action="{{route('administracion.evaluacionRecepcionBuscar')}}">
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
                                    Excel de Recepción
                                </div>
                                <div class="col-12 text-center">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.formatoInterno','1-101') }}" class="btn btn-success" download>
                                                <i class="fa-regular fa-file-excel"></i>
                                                FORMATO INTERNO
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{ route('reportes.excel.cedulas','1-101') }}" class="btn btn-success" download>
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
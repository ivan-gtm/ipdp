@extends('layouts.admin')
@section('title', 'Administracion de usuarios')
@section('modulo_titulo', 'Administracion de usuarios')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="ticketsList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Usuarios registrados en plataforma</h5>
                        <div class="flex-shrink-0">

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
                                    <th>Id Usuario</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th>Nombre</th>
                                    <th>E-mail</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all" id="ticket-list-data">
                                @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->created_at }}</td>
                                    <td>{{ $usuario->updated_at }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <!-- <span class="badge bg-success text-uppercase">CEDULA</span> -->
                                        <ul class="panel-acciones">
                                            <li>
                                                <a class="edit-item-btn" href="{{ route('administracion.detalleConsulta',[
                                                                            'folio' => $usuario->id
                                                                        ]) }}">
                                                    <i class="fa-solid fa-folder-plus"></i>
                                                    <!-- Detalles -->
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="edit-item-btn" data-bs-toggle="modal" data-bs-target="#aceptarConsultaModal">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                    <!-- Aprobar -->
                                                </button>
                                            </li>
                                            <li>
                                                <a href="{{ route('administracion.borrarUsuario',[
                                                        'usuario_id' => $usuario->id
                                                    ]) }}">
                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                </a> 
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

                    @if( $usuarios->hasPages() )
                    <div class="d-flex justify-content-end mt-2">
                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                            @if( $usuarios->onFirstPage() == false)
                            <a class="page-item pagination-prev disabled" href="{{ $usuarios->previousPageUrl() }}">
                                Anterior
                            </a>
                            @endif
                            <ul class="pagination listjs-pagination mb-0">
                                @for ($i = 1; $i <= $page_number; $i++) @if( $usuarios->currentPage() ==
                                    $i)
                                    <li class="active">
                                        @else
                                    <li>
                                        @endif
                                        <a class="page" href="{{ $usuarios->url($i) }}" data-i="1" data-page="8">
                                            {{ $i }}
                                        </a>
                                    </li>
                                    @endfor
                            </ul>
                            @if( $usuarios->hasMorePages() )
                            <a class="page-item pagination-next" href="{{ $usuarios->nextPageUrl() }}">
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
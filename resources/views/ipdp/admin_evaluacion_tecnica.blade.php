<!-- https://themesbrand.com/velzon/html/default/pages-pricing.html -->
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>

    <meta charset="utf-8">
    <title>IPDP | Gestión de CEDULAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link type="text/css" rel="stylesheet" href="{{asset('admin/style.css')}}" />

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


</head>

<body>


    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" class="">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-sm.png"
                                        alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-dark.png"
                                        alt="" height="17">
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-sm.png"
                                        alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-light.png"
                                        alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-1.jpg"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Adrian
                                            Contreras</span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Equipo
                                            Analisis</span>
                                    </span>
                                </span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <!-- <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-sm.png" alt=""
                            height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-dark.png" alt=""
                            height="17">
                    </span>
                </a> -->
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light" style="background-color: white; padding: 10px;">
                    <span class="logo-sm">
                        <img src="https://cdmx.gob.mx/resources/img/adip-header2.svg" alt="" height="200">
                    </span>
                    <span class="logo-lg">
                        <img src="https://cdmx.gob.mx/resources/img/adip-header2.svg" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar" data-simplebar="init" class="h-100">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div class="container-fluid">

                                        <div id="two-column-menu">
                                        </div>
                                        <ul class="navbar-nav" id="navbar-nav" data-simplebar="init">
                                            <div class="simplebar-wrapper" style="margin: 0px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper"
                                                            style="height: auto; overflow: hidden;">
                                                            <div class="simplebar-content" style="padding: 0px;">
                                                                <li class="menu-title"><span
                                                                        data-key="t-menu">Menu</span></li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="#sidebarApps">
                                                                        <i class="ri-apps-2-line"></i> <span
                                                                            data-key="t-apps">Cedulas</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="#">
                                                                        <i class="ri-apps-2-line"></i>
                                                                        <span data-key="t-apps">Consulta
                                                                            Indigena</span>
                                                                    </a>
                                                                    <div class="collapse menu-dropdown show"
                                                                        id="sidebarApps">
                                                                        <ul class="nav nav-sm flex-column">
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('consultaIndigena.store') }}"
                                                                                    class="nav-link"
                                                                                    data-key="t-calendar">Registrar
                                                                                    Nueva</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="/consulta_indigena.html">
                                                                        <i class="ri-apps-2-line"></i> <span
                                                                            data-key="t-apps">
                                                                            Usuarios</span>
                                                                    </a>
                                                                    <ul class="nav nav-sm flex-column">
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('consultaIndigena.store') }}"
                                                                                class="nav-link"
                                                                                data-key="t-calendar">Administrar</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('consultaIndigena.store') }}"
                                                                                class="nav-link"
                                                                                data-key="t-calendar">Registrar
                                                                                Usuario</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: auto; height: 1272px;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal"
                                                style="visibility: hidden;">
                                                <div class="simplebar-scrollbar" style="width: 0px; display: none;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                                <div class="simplebar-scrollbar" style="height: 0px; display: none;">
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <!-- Sidebar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1272px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 268px; display: block; transform: translate3d(0px, 168px, 0px);"></div>
                </div>
            </div>
        </div>
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Gestión de Solicitudes</h4>

                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Historico de Cedulas</a></li>
                                        <li class="breadcrumb-item active">Tickets List</li>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-3 col-sm-6" style="display: none;">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Total Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="counter-value">547</span>k</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                    <i class="ri-arrow-up-line align-middle"></i> 17.32 % </span> vs.
                                                previous month</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                                    <i class="ri-ticket-2-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div> <!-- end card-->
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-sm-6" style="display: none;">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Pending Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="counter-value">124</span>k</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                                        class="ri-arrow-down-line align-middle"></i> 0.96 % </span> vs.
                                                previous month</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                                    <i class="mdi mdi-timer-sand"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-sm-6" style="display: none;">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Closed Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="counter-value">107</span>K</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                                        class="ri-arrow-down-line align-middle"></i> 3.87 % </span> vs.
                                                previous month</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                                    <i class="ri-shopping-bag-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-sm-6" style="display: none;">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Deleted Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span
                                                    class="counter-value">15.95</span>%</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0">
                                                    <i class="ri-arrow-up-line align-middle"></i> 1.09 % </span> vs.
                                                previous month</p>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-info text-info rounded-circle fs-4">
                                                    <i class="ri-delete-bin-line"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="ticketsList">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Folios por analizar</h5>
                                        <div class="flex-shrink-0">

                                            <input type="text" class="btn btn-danger add-btn"
                                                placeholder="Buscar por nombre, razon, numero">
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
                                                                <button type="button" class="edit-item-btn"
                                                                    onclick="actualizarFolioId({{ $cedula->id }})"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#modalEvaluacionTecnica">
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    <!-- Aprobar -->
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button type="button" class="remove-item-btn"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#rechazoModal">
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
                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                    colors="primary:#121331,secondary:#08a88a"
                                                    style="width:75px;height:75px"></lord-icon>
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
                                            <a class="page-item pagination-prev disabled"
                                                href="{{ $cedulas->previousPageUrl() }}">
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
                                                        <a class="page" href="{{ $cedulas->url($i) }}" data-i="1"
                                                            data-page="8">
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
                    <!--end row-->
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2022 © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design &amp; Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>

    </div>

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

    <div class="modal fade" id="modalEvaluacionTecnica" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                                        <input class="form-check-input" type="radio"
                                            name="cat{{ $categoria['categoria']['id'] }}"
                                            data-categoria-id="{{ $categoria['categoria']['id'] }}"
                                            data-parametro-id="{{ $prm['id'] }}"
                                            id="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}"
                                            value="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}">
                                    </td>
                                    <td>
                                        <label class="form-check-label"
                                            for="{{ $categoria['categoria']['id'].'-'.$prm['id'] }}">
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
                            <textarea class="form-control" name="observacionesValoracion" id="observacionesValoracion"
                                rows="10"></textarea>
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

    <!-- JAVASCRIPT -->
    <script src="{{asset('css/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('css/jquery-3.6.0.min.js')}}"></script>

    <script>
        const modalEvaluacionTecnica = new bootstrap.Modal(document.getElementById('modalEvaluacionTecnica'));

        function actualizarFolioId( folio_id ) {
            $('#folio_id').val( folio_id );
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
                url: "{{ route('administracion.guardarEvaluacionAnalisisTecnico') }}",
                method: "POST",
                data: JSON.stringify(requestBody),
                contentType: 'application/json; charset=utf-8',
                dataType: 'json'
            })
            .done(function (data, textStatus, jqXHR) {
                limpiarFormularioEvaluacion();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
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
            $('input:radio:checked').each(function (index) {
                $(this).prop( "checked", false );
            });
        }

        function obtenerParametros() {
            parametros = [];

            $('input:radio:checked').each(function (index) {
                console.log(index + ": " + $(this).val());
                parametros.push($(this).val());
            });

            return parametros;
        }
    </script>
</body>

</html>
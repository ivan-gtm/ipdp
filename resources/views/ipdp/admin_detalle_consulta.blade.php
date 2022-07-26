<!-- https://themesbrand.com/velzon/html/default/pages-pricing.html -->
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>

    <meta charset="utf-8">
    <title>IPDP | Gestión de CEDULAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        
                        
                        <div class="row">
                            <div class="col-12">
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
                                                {{ $cedula->nombre }}
                                            </td>
                                            <td>
                                                <strong>Primer Apellido</strong>
                                                <br>
                                                {{ $cedula->primer_apellido }}
                                            </td>
                                            <td>
                                                <strong>Segundo Apellido</strong>
                                                <br>
                                                {{ $cedula->segundo_apellido }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Ocupación</strong>
                                                <br>
                                                {{ $cedula->ocupacion }}
                                            </td>
                                            <td>
                                                <strong>Edad</strong>
                                                <br>
                                                {{ $cedula->edad }}
                                            </td>
                                            <td>
                                                <strong>Género</strong>
                                                <br>
                                                {{ $cedula->genero }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <strong>Correo electrónico</strong>
                                                <br>
                                                {{ $cedula->correo }}
                                            </td>
                                            <td>
                                                <strong>Teléfono celular</strong>
                                                <br>
                                                {{ $cedula->celular }}
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
                                                {{ $cedula->calle }}
                                            </td>
                                            <td>
                                                <strong>Numero Exterior</strong>
                                                <br>
                                                {{ $cedula->num_exterior }}
                                            </td>
                                            <td>
                                                <strong>Numero Interior</strong>
                                                <br>
                                                {{ $cedula->num_interior }}
                                            </td>
                                            <td>
                                                <strong>Manzana / Lote</strong>
                                                <br>
                                                {{ $cedula->manzana }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Código Postal</strong>
                                                <br>
                                                {{ $cedula->cp }}
                                            </td>
                                            <td>
                                                <strong>Alcaldía</strong>
                                                <br>
                                                {{ $cedula->alcaldia }}
                                            </td>
                                            <td colspan="2">
                                                <strong>Colonia, Pueblo o Barrio</strong>
                                                <br>
                                                {{ $cedula->colonia }}
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
                                                <strong>TIPO DE REPRESENTANTE:</strong>

                                                {{ $cedula->representante }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;">
                                                <strong>VIGENCIA</strong>
                                                <br>
                                                {{ $cedula->instrumento_observar }}
                                            </td>
                                            <td>
                                                <strong>INSTRUMENTO DE PLANEACIÓN A OBSERVAR</strong>
                                                <br>
                                                PROGRAMA GENERAL DE ORDENAMIENTO TERRITORIAL DE LA CIUDAD DE MÉXICO
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                        <div class="page_break" style="page-break-before: always;"></div>

                        <div class="row">
                            <div class="col-12">
                                <br>
                                <center>
                                    <h3>OPINIÓN, RECOMENDACIÓN PROPUESTA</h3>
                                </center>
                                <p>{{ $cedula->comentarios }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                            <br>    
                            <hr>
                                <h3>ARCHIVOS</h3>
                            </div>
                            <div class="col-12">
                                @foreach ($archivos_cedula as $archivo)
                                    @if( substr($archivo->file_path,-3) == 'jpg' 
                                        || substr($archivo->file_path,-3) == 'jpeg' 
                                        || substr($archivo->file_path,-3) == 'png' 
                                        )
                                        <img class="img-fluid" src="{{ asset('storage/'.$archivo->file_path ) }}">
                                    @elseif( substr($archivo->file_path,-3) == 'pdf' )
                                        <a href="{{ asset('storage/'.$archivo->file_path ) }}" class="edit-item-btn" download>
                                            <i class="fa-solid fa-file-pdf"></i>
                                            <!-- Descargar como PDF -->
                                        </a>
                                    @elseif( substr($archivo->file_path,-3) == 'doc' || substr($archivo->file_path,-3) == 'ocx' )
                                        <a href="{{ substr($archivo->file_path,-3) }}" class="edit-item-btn" download>
                                            <i class="fa-solid fa-file-pdf"></i>
                                            <!-- Descargar como PDF -->
                                        </a>
                                    @endif
                                    
                                @endforeach
                            </div>
                        </div>
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

    <div class="modal fade" id="aceptarConsultaModal" tabindex="-1" aria-labelledby="rechazoModalLabel"
        aria-hidden="true">
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

    <!-- JAVASCRIPT -->
    <script src="{{asset('css/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('css/jquery-3.6.0.min.js')}}"></script>
</body>

</html>
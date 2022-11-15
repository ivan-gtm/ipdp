<!-- https://themesbrand.com/velzon/html/default/pages-pricing.html -->
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>

    <meta charset="utf-8">
    <title>IPDP | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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

        .btn-danger {
            color: #fff;
            background-color: var(--vz-input-bg);
            background-clip: padding-box;
            border: 1px solid var(--vz-input-border);
            width: 294px;
        }

        ul.panel-acciones>li button, 
        ul.panel-acciones>li a {
            background-color: transparent;
            border: none;
            color: #6F7271;
            font-size: 23px;
        }

        .ajax_loader{
            --ldr-backdrop-zindex:1050;
            --ldr-backdrop-bg:#000;
            --ldr-backdrop-opacity:0.5;
            position:fixed;
            top:0;
            left:0;
            z-index:var(--ldr-backdrop-zindex);
            width:100vw;
            height:100vh;
            background-color:var(--ldr-backdrop-bg);
            opacity:var(--ldr-backdrop-opacity);        
        }

    </style>

    @yield('head')
</head>

<body>

<div class="ajax_loader d-none d-flex justify-content-center" id="ajaxloader" name="ajaxloader">
    <div class="spinner-border text-success " style="width: 6rem; height: 6rem; margin: auto;" role="status">
    <span class="sr-only">Loading...</span>
    </div>
</div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar" class="">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{ route('administracion.home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="{{ route('administracion.home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-sm.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/logo-light.png" alt="" height="17">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>


                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <div class="btn" id="page-header-user-dropdown">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user" src="{{ asset('/imgs/user.png') }}" alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                            @if(Auth::check())
                                                {{ Auth::user()->name }}
                                            @endif
                                        </span>
                                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">
                                            Equipo
                                            @if(Auth::check())
                                                {{ ucfirst( Auth::user()->rol ) }}
                                            @endif
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <ul class="navbar-nav" style="
    background-color: #bc955c;
    padding: 14px 10px;
">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('signout') }}">SALIR</a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                
                <!-- Light Logo-->
                <a href="{{ route('administracion.home') }}" class="logo logo-light" style="padding: 10px;">
                    <span class="logo-sm">
                        <img src="{{ asset('/imgs/logo-light.svg') }}" alt="" height="200">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('/imgs/logo-light.svg') }}" alt="" height="50">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
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
                                                        <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                                            <div class="simplebar-content" style="padding: 0px;">
                                                                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                                                                
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active" href="#sidebarApps">
                                                                        <i class="fa-solid fa-bars"></i>
                                                                        <span data-key="t-apps">Valoración de Cedulas</span>
                                                                    </a>
                                                                    <div class="collapse menu-dropdown show" id="sidebarApps">
                                                                        <ul class="nav nav-sm flex-column">
                                                                            @if( Auth::check() && Auth::user()->rol == 'recepcion' || Auth::user()->rol == 'administracion')
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.evaluacionRecepcion') }}" class="nav-link" data-key="t-calendar">
                                                                                    Recepción
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                            
                                                                            @if( Auth::check() && ( Auth::user()->rol == 'analisis' || Auth::user()->rol == 'administracion') )
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.evaluacionAnalisis') }}" class="nav-link" data-key="t-calendar">
                                                                                    Análisis
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                            
                                                                            @if( Auth::check() && ( Auth::user()->rol == 'tecnica' || Auth::user()->rol == 'administracion') )
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.evaluacionTecnica') }}" class="nav-link" data-key="t-calendar">
                                                                                    Valoración Técnica
                                                                                </a>
                                                                            </li>
                                                                            @endif

                                                                            @if( Auth::check() && ( Auth::user()->rol == 'juridica' || Auth::user()->rol == 'administracion') )
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.evaluacionJuridica') }}" class="nav-link" data-key="t-calendar">
                                                                                    Valoración Jurídica
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                            
                                                                            @if( Auth::check() && ( Auth::user()->rol == 'integracion_pgd' || Auth::user()->rol == 'integracion_pgot' || Auth::user()->rol == 'administracion') )
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.evaluacionIntegracion') }}" class="nav-link" data-key="t-calendar">
                                                                                    Integración
                                                                                </a>
                                                                            </li>
                                                                            @endif

                                                                            @if( Auth::check() )
                                                                            <li class="nav-item">
                                                                                <a href="{{ route('administracion.anexosParticipacion') }}" class="nav-link" data-key="t-calendar">
                                                                                    Anexos Participación
                                                                                </a>
                                                                            </li>
                                                                            @endif
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                
                                                                @if( Auth::check() && Auth::user()->rol == 'recepcion' || Auth::user()->rol == 'administracion')
                                                                    <li class="nav-item">
                                                                        <a class="nav-link menu-link collapsed active" href="#">
                                                                            <i class="fa-solid fa-bars"></i>
                                                                            <span data-key="t-apps">Recepción</span>
                                                                        </a>
                                                                        <div class="collapse menu-dropdown show" id="sidebarApps">
                                                                            <ul class="nav nav-sm flex-column">
                                                                                <li class="nav-item">
                                                                                    <a href="{{ route('consultaIndigena.store') }}" class="nav-link" data-key="t-calendar">
                                                                                        Registrar Formato Interno de Registro
                                                                                    </a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a href="{{ route('administracion.registrarConsultaPublica') }}" class="nav-link" data-key="t-calendar">
                                                                                        Registrar Consulta Publica
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li>
                                                                @endif
                                                                
                                                                @if( Auth::check() && Auth::user()->rol == 'administracion' )
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active" href="{{ route('usuariosSistema') }}">
                                                                        <i class="fa-solid fa-bars"></i>
                                                                        <span data-key="t-apps">
                                                                            Usuarios</span>
                                                                    </a>
                                                                    <ul class="nav nav-sm flex-column">
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('usuariosSistema') }}" class="nav-link" data-key="t-calendar">Administrar</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a href="{{ route('administracion.registrarUsuario') }}" class="nav-link" data-key="t-calendar">Registrar
                                                                                Usuario</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: auto; height: 1272px;">
                                                </div>
                                            </div>
                                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
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
                    <div class="simplebar-scrollbar" style="height: 268px; display: block; transform: translate3d(0px, 168px, 0px);"></div>
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
                                <h4 class="mb-sm-0">
                                    @yield('modulo_titulo')
                                </h4>

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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value">547</span>k</h2>
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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value">124</span>k</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 0.96 % </span> vs.
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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value">107</span>K</h2>
                                            <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i class="ri-arrow-down-line align-middle"></i> 3.87 % </span> vs.
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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value">15.95</span>%</h2>
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
                        <div class="col-12">
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    @yield('content')
                    
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
        </div>

    </div>

    <!-- Modal -->
    @yield('modales')

    <!-- JAVASCRIPT -->
    <script src="{{asset('css/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('css/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript">
        function hideLoader(){
            $("#ajaxloader").removeClass('d-inline').addClass('d-none');
        }
        function showLoader(){
            $("#ajaxloader").removeClass('d-none').addClass('d-inline');
        }
    </script>
    @yield('js')
</body>

</html>
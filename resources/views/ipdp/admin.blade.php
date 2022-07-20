<!-- https://themesbrand.com/velzon/html/default/pages-pricing.html -->
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>

    <meta charset="utf-8">
    <title>IPDP | Gestión de CEDULAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    
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
        ul.panel-acciones > li {
            float: left;
            list-style: none;
            padding: 0 5px;
        }
        ul.panel-acciones > li > a{
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

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <!-- <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div> -->
                            <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                                <div data-simplebar="init" style="max-height: 320px;">
                                    <div class="simplebar-wrapper" style="margin: 0px;">
                                        <div class="simplebar-height-auto-observer-wrapper">
                                            <div class="simplebar-height-auto-observer"></div>
                                        </div>
                                        <div class="simplebar-mask">
                                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                    aria-label="scrollable content"
                                                    style="height: auto; overflow: hidden;">
                                                    <div class="simplebar-content" style="padding: 0px;">
                                                        <!-- item-->
                                                        <div class="dropdown-header">
                                                            <h6 class="text-overflow text-muted mb-0 text-uppercase">
                                                                Recent Searches</h6>
                                                        </div>

                                                        <div class="dropdown-item bg-transparent text-wrap">
                                                            <a href="index.html"
                                                                class="btn btn-soft-secondary btn-sm btn-rounded">how to
                                                                setup <i class="mdi mdi-magnify ms-1"></i></a>
                                                            <a href="index.html"
                                                                class="btn btn-soft-secondary btn-sm btn-rounded">buttons
                                                                <i class="mdi mdi-magnify ms-1"></i></a>
                                                        </div>
                                                        <!-- item-->
                                                        <div class="dropdown-header mt-2">
                                                            <h6 class="text-overflow text-muted mb-1 text-uppercase">
                                                                Pages</h6>
                                                        </div>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>Analytics Dashboard</span>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>Help Center</span>
                                                        </a>

                                                        <!-- item-->
                                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                            <i
                                                                class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                                            <span>My account settings</span>
                                                        </a>

                                                        <!-- item-->
                                                        <div class="dropdown-header mt-2">
                                                            <h6 class="text-overflow text-muted mb-2 text-uppercase">
                                                                Members</h6>
                                                        </div>

                                                        <div class="notification-list">
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-2.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-1">
                                                                        <h6 class="m-0">Angela Bernier</h6>
                                                                        <span
                                                                            class="fs-11 mb-0 text-muted">Manager</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-3.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-1">
                                                                        <h6 class="m-0">David Grasso</h6>
                                                                        <span class="fs-11 mb-0 text-muted">Web
                                                                            Designer</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <!-- item -->
                                                            <a href="javascript:void(0);"
                                                                class="dropdown-item notify-item py-2">
                                                                <div class="d-flex">
                                                                    <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-5.jpg"
                                                                        class="me-3 rounded-circle avatar-xs"
                                                                        alt="user-pic">
                                                                    <div class="flex-1">
                                                                        <h6 class="m-0">Mike Bunch</h6>
                                                                        <span class="fs-11 mb-0 text-muted">React
                                                                            Developer</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                    </div>
                                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                    </div>
                                </div>

                                <div class="text-center pt-3 pb-1">
                                    <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results
                                        <i class="ri-arrow-right-line ms-1"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="d-flex align-items-center">

                        <div class="dropdown d-md-none topbar-head-dropdown header-item">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-search fs-22"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..."
                                                aria-label="Recipient's username">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="dropdown topbar-head-dropdown ms-1 header-item" style="display: none;">
                            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="bx bx-bell fs-22"></i>
                                <span
                                    class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                                        class="visually-hidden">unread messages</span></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-notifications-dropdown">

                                <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                            </div>
                                            <div class="col-auto dropdown-tabs">
                                                <span class="badge badge-soft-light fs-13"> 4 New</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-2 pt-2">
                                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                            id="notificationItemsTab" role="tablist">
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab"
                                                    role="tab" aria-selected="true">
                                                    All (4)
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                                                    aria-selected="false">
                                                    Messages
                                                </a>
                                            </li>
                                            <li class="nav-item waves-effect waves-light">
                                                <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                                                    aria-selected="false">
                                                    Alerts
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="tab-content" id="notificationItemsTabContent">
                                    <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                        <div data-simplebar="init" style="max-height: 300px;" class="pe-2">
                                            <div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper" tabindex="0"
                                                            role="region" aria-label="scrollable content"
                                                            style="height: auto; overflow: hidden;">
                                                            <div class="simplebar-content"
                                                                style="padding: 0px 8px 0px 0px;">
                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item position-relative">
                                                                    <div class="d-flex">
                                                                        <div class="avatar-xs me-3">
                                                                            <span
                                                                                class="avatar-title bg-soft-info text-info rounded-circle fs-16">
                                                                                <i class="bx bx-badge-check"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-2 lh-base">Your
                                                                                    <b>Elite</b> author Graphic
                                                                                    Optimization <span
                                                                                        class="text-secondary">reward</span>
                                                                                    is
                                                                                    ready!
                                                                                </h6>
                                                                            </a>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    Just 30 sec ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="all-notification-check01">
                                                                                <label class="form-check-label"
                                                                                    for="all-notification-check01"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item position-relative active">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-2.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    Angela Bernier</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">Answered to your comment
                                                                                    on the cash flow forecast's
                                                                                    graph 🔔.</p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    48 min ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="all-notification-check02"
                                                                                    checked="">
                                                                                <label class="form-check-label"
                                                                                    for="all-notification-check02"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item position-relative">
                                                                    <div class="d-flex">
                                                                        <div class="avatar-xs me-3">
                                                                            <span
                                                                                class="avatar-title bg-soft-danger text-danger rounded-circle fs-16">
                                                                                <i
                                                                                    class="bx bx-message-square-dots"></i>
                                                                            </span>
                                                                        </div>
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-2 fs-13 lh-base">You
                                                                                    have received <b
                                                                                        class="text-success">20</b> new
                                                                                    messages in the conversation
                                                                                </h6>
                                                                            </a>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    2 hrs ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="all-notification-check03">
                                                                                <label class="form-check-label"
                                                                                    for="all-notification-check03"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item position-relative">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-8.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    Maureen Gibson</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">We talked about a
                                                                                    project on linkedin.</p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    4 hrs ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="all-notification-check04">
                                                                                <label class="form-check-label"
                                                                                    for="all-notification-check04"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="my-3 text-center">
                                                                    <button type="button"
                                                                        class="btn btn-soft-success waves-effect waves-light">View
                                                                        All Notifications <i
                                                                            class="ri-arrow-right-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;">
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
                                        </div>

                                    </div>

                                    <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel"
                                        aria-labelledby="messages-tab">
                                        <div data-simplebar="init" style="max-height: 300px;" class="pe-2">
                                            <div class="simplebar-wrapper" style="margin: 0px -8px 0px 0px;">
                                                <div class="simplebar-height-auto-observer-wrapper">
                                                    <div class="simplebar-height-auto-observer"></div>
                                                </div>
                                                <div class="simplebar-mask">
                                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                        <div class="simplebar-content-wrapper" tabindex="0"
                                                            role="region" aria-label="scrollable content"
                                                            style="height: auto; overflow: hidden;">
                                                            <div class="simplebar-content"
                                                                style="padding: 0px 8px 0px 0px;">
                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-3.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    James Lemire</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">We talked about a
                                                                                    project on linkedin.</p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    30 min ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="messages-notification-check01">
                                                                                <label class="form-check-label"
                                                                                    for="messages-notification-check01"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-2.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    Angela Bernier</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">Answered to your comment
                                                                                    on the cash flow forecast's
                                                                                    graph 🔔.</p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    2 hrs ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="messages-notification-check02">
                                                                                <label class="form-check-label"
                                                                                    for="messages-notification-check02"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-6.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    Kenneth Brown</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">Mentionned you in his
                                                                                    comment on 📃 invoice #12501.
                                                                                </p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    10 hrs ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="messages-notification-check03">
                                                                                <label class="form-check-label"
                                                                                    for="messages-notification-check03"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="text-reset notification-item d-block dropdown-item">
                                                                    <div class="d-flex">
                                                                        <img src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-8.jpg"
                                                                            class="me-3 rounded-circle avatar-xs"
                                                                            alt="user-pic">
                                                                        <div class="flex-1">
                                                                            <a href="#!" class="stretched-link">
                                                                                <h6 class="mt-0 mb-1 fs-13 fw-semibold">
                                                                                    Maureen Gibson</h6>
                                                                            </a>
                                                                            <div class="fs-13 text-muted">
                                                                                <p class="mb-1">We talked about a
                                                                                    project on linkedin.</p>
                                                                            </div>
                                                                            <p
                                                                                class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                                <span><i
                                                                                        class="mdi mdi-clock-outline"></i>
                                                                                    3 days ago</span>
                                                                            </p>
                                                                        </div>
                                                                        <div class="px-2 fs-15">
                                                                            <div class="form-check notification-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox" value=""
                                                                                    id="messages-notification-check04">
                                                                                <label class="form-check-label"
                                                                                    for="messages-notification-check04"></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="my-3 text-center">
                                                                    <button type="button"
                                                                        class="btn btn-soft-success waves-effect waves-light">View
                                                                        All Messages <i
                                                                            class="ri-arrow-right-line align-middle"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;">
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel"
                                        aria-labelledby="alerts-tab">
                                        <div class="w-25 w-sm-50 pt-3 mx-auto">
                                            <img src="https://themesbrand.com/velzon/html/default/assets/images/svg/bell.svg"
                                                class="img-fluid" alt="user-pic">
                                        </div>
                                        <div class="text-center pb-5 mt-2">
                                            <h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    <img class="rounded-circle header-profile-user"
                                        src="https://themesbrand.com/velzon/html/default/assets/images/users/avatar-1.jpg"
                                        alt="Header Avatar">
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Adrian
                                            Contreras</span>
                                        <span
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Equipo Analisis</span>
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome Anna!</h6>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" href="apps-chat.html"><i
                                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Messages</span></a>
                                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i>
                                    <span class="align-middle">Taskboard</span></a>
                                <a class="dropdown-item" href="pages-faqs.html"><i
                                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Help</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-profile.html"><i
                                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Balance : <b>$5971.67</b></span></a>
                                <a class="dropdown-item" href="pages-profile-settings.html"><span
                                        class="badge bg-soft-success text-success mt-1 float-end">New</span><i
                                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Settings</span></a>
                                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Lock screen</span></a>
                                <a class="dropdown-item" href="auth-logout-basic.html"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
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
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
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
                                                        <div class="simplebar-content-wrapper" tabindex="0"
                                                            role="region" aria-label="scrollable content"
                                                            style="height: auto; overflow: hidden;">
                                                            <div class="simplebar-content" style="padding: 0px;">
                                                                <li class="menu-title"><span
                                                                        data-key="t-menu">Menu</span></li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="#sidebarApps" data-bs-toggle="collapse"
                                                                        role="button" aria-expanded="false"
                                                                        aria-controls="sidebarApps">
                                                                        <i class="ri-apps-2-line"></i> <span
                                                                            data-key="t-apps">Cedulas</span>
                                                                    </a>
                                                                    <!-- <div class="collapse menu-dropdown show"
                                                                        id="sidebarApps">
                                                                        <ul class="nav nav-sm flex-column">
                                                                            <li class="nav-item">
                                                                                <a href="/consulta_indigena.html"
                                                                                    class="nav-link"
                                                                                    data-key="t-calendar"> Registrar Consulta Indigena </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div> -->
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="/consulta_indigena.html" data-bs-toggle="collapse"
                                                                        role="button" aria-expanded="false"
                                                                        aria-controls="sidebarApps">
                                                                        <i class="ri-apps-2-line"></i> <span
                                                                            data-key="t-apps">Registrar Consulta Indigena</span>
                                                                    </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                    <a class="nav-link menu-link collapsed active"
                                                                        href="/consulta_indigena.html" data-bs-toggle="collapse"
                                                                        role="button" aria-expanded="false"
                                                                        aria-controls="sidebarApps">
                                                                        <i class="ri-apps-2-line"></i> <span
                                                                            data-key="t-apps">Administrar Usuarios</span>
                                                                    </a>
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
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                    >547</span>k</h2>
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
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value">107</span>K</h2>
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
                        <div class="col-lg-12">
                            <div class="card" id="ticketsList">
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Folios por analizar</h5>
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
                                                            {{ $cedula->status }}
                                                        </td>
                                                        <td class="create_date">
                                                            <ul class="panel-acciones">
                                                                <li>
                                                                    <a class="edit-item-btn" href="#" >
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
                                                                    <a class="edit-item-btn" href="#" >
                                                                        <i class="fa-solid fa-circle-check"></i>
                                                                        <!-- Aprobar -->
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="remove-item-btn" href="#deleteOrder">
                                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                                        <!-- Rechazar -->
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <th scope="row">
                                                        1
                                                    </th>
                                                    <td class="id"><a href="javascript:void(0);"
                                                            onclick="ViewTickets(this)" data-id="13"
                                                            class="fw-medium link-primary ticket-id">#123123</a></td>
                                                    <td class="tasks_name">21/07/2022</td>
                                                    <td class="client_name">
                                                        <span class="badge bg-success text-uppercase">CEDULA</span>
                                                    </td>
                                                    <td class="assignedto">Juan Rivas</td>
                                                    <td class="status">
                                                        <span class="badge badge-soft-warning text-uppercase">Recepción</span>
                                                    </td>
                                                    <td class="create_date">
                                                        <ul class="panel-acciones">
                                                            <li>
                                                                <a class="edit-item-btn" href="#" >
                                                                    <i class="fa-solid fa-folder-plus"></i>
                                                                    <!-- Detalles -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#" >
                                                                    <i class="fa-solid fa-file-pdf"></i>
                                                                    <!-- Descargar como PDF -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#" >
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    <!-- Aprobar -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="remove-item-btn" href="#deleteOrder">
                                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                                    <!-- Rechazar -->
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
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
                                                <a class="page-item pagination-prev disabled" href="{{ $cedulas->previousPageUrl() }}">
                                                    Anterior
                                                </a>
                                            @endif 
                                            <ul class="pagination listjs-pagination mb-0">
                                                @for ($i = 1; $i <= $page_number; $i++)
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
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    
    <!-- JAVASCRIPT -->
    <script src="{{asset('css/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('css/jquery-3.6.0.min.js')}}"></script>

</body>

</html>
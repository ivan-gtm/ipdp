<!-- https://themesbrand.com/velzon/html/default/pages-pricing.html -->
<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-layout-mode="light" data-layout-width="fluid" data-layout-position="fixed" data-layout-style="default">

<head>

    <meta charset="utf-8">
    <title>Tickets List | Velzon - Admin &amp; Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
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
                                            class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
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
                                                                            data-key="t-apps">Apps</span>
                                                                    </a>
                                                                    <div class="collapse menu-dropdown show"
                                                                        id="sidebarApps">
                                                                        <ul class="nav nav-sm flex-column">
                                                                            <li class="nav-item">
                                                                                <a href="apps-calendar.html"
                                                                                    class="nav-link"
                                                                                    data-key="t-calendar"> Calendar </a>
                                                                            </li>
                                                                            <li class="nav-item">
                                                                                <a href="apps-chat.html"
                                                                                    class="nav-link" data-key="t-chat">
                                                                                    Chat </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
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

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tickets</a></li>
                                        <li class="breadcrumb-item active">Tickets List</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Total Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                    data-target="547">547</span>k</h2>
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
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Pending Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                    data-target="124">124</span>k</h2>
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
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Closed Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                    data-target="107">107</span>K</h2>
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
                        <div class="col-xxl-3 col-sm-6">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-muted mb-0">Deleted Tickets</p>
                                            <h2 class="mt-4 ff-secondary fw-semibold"><span class="counter-value"
                                                    data-target="15.95">15.95</span>%</h2>
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
                                            <!-- <button class="btn btn-danger add-btn" data-bs-toggle="modal"
                                                data-bs-target="#showModal"><i
                                                    class="ri-add-line align-bottom me-1"></i> Create Tickets</button> -->
                                            <input type="text" class="btn btn-danger add-btn" placeholder="Buscar por nombre, razon, numero">
                                            <button class="btn btn-soft-danger" onclick="deleteMultiple()">
                                                <i class="fa-solid fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-dashed border-end-0 border-start-0">
                                    <form>
                                        <div class="row g-3">
                                            <!-- <div class="col-xs-5">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search bg-light border-light"
                                                        placeholder="Search for ticket details or something...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            <div class="col-xs-5">
                                                <button type="button" class="btn btn-primary w-100"
                                                    onclick="SearchData();"> <i
                                                        class="ri-equalizer-fill me-1 align-bottom"></i>
                                                    Filtrar
                                                </button>
                                            </div> -->
                                            <!--end col-->
                                            <!--end col-->

                                            <!-- <div class="col-xxl-3 col-sm-4">
                                                <input type="text"
                                                    class="form-control bg-light border-light flatpickr-input"
                                                    data-provider="flatpickr" data-date-format="d M, Y"
                                                    data-range-date="true" id="demo-datepicker"
                                                    placeholder="Select date range" readonly="readonly">
                                            </div> -->
                                            <!--end col-->

                                            <!-- <div class="col-md-3 col-sm-4">
                                                <div class="input-light">
                                                    <div class="choices" data-type="select-one" tabindex="0"
                                                        role="listbox" aria-haspopup="true" aria-expanded="false">
                                                        <div class="choices__inner"><select
                                                                class="form-control choices__input" data-choices=""
                                                                data-choices-search-false=""
                                                                name="choices-single-default" id="idStatus" hidden=""
                                                                tabindex="-1" data-choice="active">
                                                                <option value="all"
                                                                    data-custom-properties="[object Object]">All
                                                                </option>
                                                            </select>
                                                            <div class="choices__list choices__list--single">
                                                                <div class="choices__item choices__item--selectable"
                                                                    data-item="" data-id="1" data-value="all"
                                                                    data-custom-properties="[object Object]"
                                                                    aria-selected="true">All</div>
                                                            </div>
                                                        </div>
                                                        <div class="choices__list choices__list--dropdown"
                                                            aria-expanded="false">
                                                            <div class="choices__list" role="listbox">
                                                                <div id="choices--idStatus-item-choice-6"
                                                                    class="choices__item choices__item--choice choices__placeholder choices__item--selectable"
                                                                    role="option" data-choice="" data-id="6"
                                                                    data-value="" data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="false">
                                                                    Status</div>
                                                                <div id="choices--idStatus-item-choice-1"
                                                                    class="choices__item choices__item--choice is-selected choices__item--selectable"
                                                                    role="option" data-choice="" data-id="1"
                                                                    data-value="all" data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="false">All
                                                                </div>
                                                                <div id="choices--idStatus-item-choice-2"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="2"
                                                                    data-value="Closed"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="false">
                                                                    Closed</div>
                                                                <div id="choices--idStatus-item-choice-3"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="3"
                                                                    data-value="Inprogress"
                                                                    data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="false">
                                                                    Inprogress</div>
                                                                <div id="choices--idStatus-item-choice-4"
                                                                    class="choices__item choices__item--choice choices__item--selectable"
                                                                    role="option" data-choice="" data-id="4"
                                                                    data-value="New" data-select-text="Press to select"
                                                                    data-choice-selectable="">New</div>
                                                                <div id="choices--idStatus-item-choice-5"
                                                                    class="choices__item choices__item--choice choices__item--selectable is-highlighted"
                                                                    role="option" data-choice="" data-id="5"
                                                                    data-value="Open" data-select-text="Press to select"
                                                                    data-choice-selectable="" aria-selected="true">Open
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!--end col-->

                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end card-body-->
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
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-folder-plus"></i>
                                                                    <!-- Detalles -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-file-pdf"></i>
                                                                    <!-- Descargar como PDF -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    <!-- Aprobar -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="remove-item-btn"
                                                                    data-bs-toggle="modal" href="#deleteOrder">
                                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                                    <!-- Rechazar -->
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
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
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-folder-plus"></i>
                                                                    <!-- Detalles -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-file-pdf"></i>
                                                                    <!-- Descargar como PDF -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    <!-- Aprobar -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="remove-item-btn"
                                                                    data-bs-toggle="modal" href="#deleteOrder">
                                                                    <i class="fa-solid fa-circle-xmark"></i>
                                                                    <!-- Rechazar -->
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
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
                                                        <span class="badge badge-soft-danger text-uppercase">Integración</span>
                                                    </td>
                                                    <td class="create_date">
                                                        <ul class="panel-acciones">
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-folder-plus"></i>
                                                                    <!-- Detalles -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-file-pdf"></i>
                                                                    <!-- Descargar como PDF -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="edit-item-btn" href="#showModal" data-bs-toggle="modal">
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    <!-- Aprobar -->
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="remove-item-btn"
                                                                    data-bs-toggle="modal" href="#deleteOrder">
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
                                    <div class="d-flex justify-content-end mt-2">
                                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                                            <a class="page-item pagination-prev disabled" href="#">
                                                Previous
                                            </a>
                                            <ul class="pagination listjs-pagination mb-0">
                                                <li class="active"><a class="page" href="#" data-i="1"
                                                        data-page="8">1</a></li>
                                                <li><a class="page" href="#" data-i="2" data-page="8">2</a></li>
                                            </ul>
                                            <a class="page-item pagination-next" href="#">
                                                Next
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json"
                                                        trigger="loop" colors="primary:#405189,secondary:#f06548"
                                                        style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4>You are about to delete a order ?</h4>
                                                        <p class="text-muted fs-14 mb-4">Deleting your order will remove
                                                            all of your information from our database.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button
                                                                class="btn btn-link link-success fw-medium text-decoration-none"
                                                                data-bs-dismiss="modal"><i
                                                                    class="ri-close-line me-1 align-middle"></i>
                                                                Close</button>
                                                            <button class="btn btn-danger" id="delete-record">Yes,
                                                                Delete It</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end modal -->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->

                    <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-soft-info">
                                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <div id="modal-id">
                                                    <label for="orderId" class="form-label">ID</label>
                                                    <input type="text" id="orderId" class="form-control"
                                                        placeholder="ID" value="#VLZ462" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="tasksTitle-field" class="form-label">Title</label>
                                                    <input type="text" id="tasksTitle-field" class="form-control"
                                                        placeholder="Title" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="client_nameName-field" class="form-label">Client
                                                        Name</label>
                                                    <input type="text" id="client_nameName-field" class="form-control"
                                                        placeholder="Client Name" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="assignedtoName-field" class="form-label">Assigned
                                                        To</label>
                                                    <input type="text" id="assignedtoName-field" class="form-control"
                                                        placeholder="Assigned to" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="date-field" class="form-label">Create Date</label>
                                                <input type="text" id="date-field" class="form-control flatpickr-input"
                                                    data-provider="flatpickr" data-date-format="d M, Y"
                                                    placeholder="Create Date" required="" readonly="readonly">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="duedate-field" class="form-label">Due Date</label>
                                                <input type="text" id="duedate-field"
                                                    class="form-control flatpickr-input" data-provider="flatpickr"
                                                    data-date-format="d M, Y" placeholder="Due Date" required=""
                                                    readonly="readonly">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="ticket-status" class="form-label">Status</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select
                                                            class="form-control choices__input" data-plugin="choices"
                                                            name="ticket-status" id="ticket-status" hidden=""
                                                            tabindex="-1" data-choice="active">
                                                            <option value="" data-custom-properties="[object Object]">
                                                                Status</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__placeholder choices__item--selectable"
                                                                data-item="" data-id="1" data-value=""
                                                                data-custom-properties="[object Object]"
                                                                aria-selected="true">Status</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown"
                                                        aria-expanded="false">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--ticket-status-item-choice-5"
                                                                class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted"
                                                                role="option" data-choice="" data-id="5" data-value=""
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="" aria-selected="true">Status
                                                            </div>
                                                            <div id="choices--ticket-status-item-choice-1"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="1"
                                                                data-value="Closed" data-select-text="Press to select"
                                                                data-choice-selectable="">Closed</div>
                                                            <div id="choices--ticket-status-item-choice-2"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="2"
                                                                data-value="Inprogress"
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="">Inprogress</div>
                                                            <div id="choices--ticket-status-item-choice-3"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="3"
                                                                data-value="New" data-select-text="Press to select"
                                                                data-choice-selectable="">New</div>
                                                            <div id="choices--ticket-status-item-choice-4"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="4"
                                                                data-value="Open" data-select-text="Press to select"
                                                                data-choice-selectable="">Open</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="priority-field" class="form-label">Priority</label>
                                                <div class="choices" data-type="select-one" tabindex="0" role="listbox"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <div class="choices__inner"><select
                                                            class="form-control choices__input" data-plugin="choices"
                                                            name="priority-field" id="priority-field" hidden=""
                                                            tabindex="-1" data-choice="active">
                                                            <option value="" data-custom-properties="[object Object]">
                                                                Priority</option>
                                                        </select>
                                                        <div class="choices__list choices__list--single">
                                                            <div class="choices__item choices__placeholder choices__item--selectable"
                                                                data-item="" data-id="1" data-value=""
                                                                data-custom-properties="[object Object]"
                                                                aria-selected="true">Priority</div>
                                                        </div>
                                                    </div>
                                                    <div class="choices__list choices__list--dropdown"
                                                        aria-expanded="false">
                                                        <div class="choices__list" role="listbox">
                                                            <div id="choices--priority-field-item-choice-4"
                                                                class="choices__item choices__item--choice is-selected choices__placeholder choices__item--selectable is-highlighted"
                                                                role="option" data-choice="" data-id="4" data-value=""
                                                                data-select-text="Press to select"
                                                                data-choice-selectable="" aria-selected="true">Priority
                                                            </div>
                                                            <div id="choices--priority-field-item-choice-1"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="1"
                                                                data-value="High" data-select-text="Press to select"
                                                                data-choice-selectable="">High</div>
                                                            <div id="choices--priority-field-item-choice-2"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="2"
                                                                data-value="Low" data-select-text="Press to select"
                                                                data-choice-selectable="">Low</div>
                                                            <div id="choices--priority-field-item-choice-3"
                                                                class="choices__item choices__item--choice choices__item--selectable"
                                                                role="option" data-choice="" data-id="3"
                                                                data-value="Medium" data-select-text="Press to select"
                                                                data-choice-selectable="">Medium</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Add
                                                Ticket</button>
                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top" style="display: none;">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    

    <!-- Theme Settings -->
    <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            <div data-simplebar="init" class="h-100">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="padding: 0px;">
                                    <div class="p-4">
                                        <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
                                        <p class="text-muted">Choose your layout</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input id="customizer-layout01" name="data-layout" type="radio"
                                                        value="vertical" class="form-check-input">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="customizer-layout01">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-13 text-center mt-2">Vertical</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input id="customizer-layout02" name="data-layout" type="radio"
                                                        value="horizontal" class="form-check-input">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="customizer-layout02">
                                                        <span class="d-flex h-100 flex-column gap-1">
                                                            <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                                                <span
                                                                    class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                                <span
                                                                    class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                                <span
                                                                    class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                                            </span>
                                                            <span class="bg-light d-block p-1"></span>
                                                            <span class="bg-light d-block p-1 mt-auto"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input id="customizer-layout03" name="data-layout" type="radio"
                                                        value="twocolumn" class="form-check-input">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="customizer-layout03">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                                    <span
                                                                        class="d-block p-1 bg-soft-primary mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-13 text-center mt-2">Two Column</h5>
                                            </div>
                                            <!-- end col -->
                                        </div>

                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
                                        <p class="text-muted">Choose Light or Dark Scheme.</p>

                                        <div class="colorscheme-cardradio">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-mode" id="layout-mode-light"
                                                            value="light">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="layout-mode-light">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-check card-radio dark">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-mode" id="layout-mode-dark" value="dark">
                                                        <label class="form-check-label p-0 avatar-md w-100 bg-dark"
                                                            for="layout-mode-dark">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-soft-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-soft-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-soft-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="layout-width" style="display: block;">
                                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                                            <p class="text-muted">Choose Fluid or Boxed layout.</p>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-width" id="layout-width-fluid"
                                                            value="fluid">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="layout-width-fluid">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-width" id="layout-width-boxed"
                                                            value="boxed">
                                                        <label class="form-check-label p-0 avatar-md w-100 px-2"
                                                            for="layout-width-boxed">
                                                            <span class="d-flex gap-1 h-100 border-start border-end">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="layout-position" style="display: block;">
                                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Position</h6>
                                            <p class="text-muted">Choose Fixed or Scrollable Layout Position.</p>

                                            <div class="btn-group radio" role="group">
                                                <input type="radio" class="btn-check" name="data-layout-position"
                                                    id="layout-position-fixed" value="fixed">
                                                <label class="btn btn-light w-sm"
                                                    for="layout-position-fixed">Fixed</label>

                                                <input type="radio" class="btn-check" name="data-layout-position"
                                                    id="layout-position-scrollable" value="scrollable">
                                                <label class="btn btn-light w-sm ms-0"
                                                    for="layout-position-scrollable">Scrollable</label>
                                            </div>
                                        </div>
                                        <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
                                        <p class="text-muted">Choose Light or Dark Topbar Color.</p>

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input class="form-check-input" type="radio" name="data-topbar"
                                                        id="topbar-color-light" value="light">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="topbar-color-light">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-light d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-13 text-center mt-2">Light</h5>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-check card-radio">
                                                    <input class="form-check-input" type="radio" name="data-topbar"
                                                        id="topbar-color-dark" value="dark">
                                                    <label class="form-check-label p-0 avatar-md w-100"
                                                        for="topbar-color-dark">
                                                        <span class="d-flex gap-1 h-100">
                                                            <span class="flex-shrink-0">
                                                                <span
                                                                    class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                    <span
                                                                        class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    <span
                                                                        class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                </span>
                                                            </span>
                                                            <span class="flex-grow-1">
                                                                <span class="d-flex h-100 flex-column">
                                                                    <span class="bg-primary d-block p-1"></span>
                                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <h5 class="fs-13 text-center mt-2">Dark</h5>
                                            </div>
                                        </div>

                                        <div id="sidebar-size" style="display: block;">
                                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                                            <p class="text-muted">Choose a size of Sidebar.</p>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-sidebar-size" id="sidebar-size-default"
                                                            value="lg">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-size-default">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-sidebar-size" id="sidebar-size-compact"
                                                            value="md">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-size-compact">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-sidebar-size" id="sidebar-size-small" value="sm">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-size-small">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1">
                                                                        <span
                                                                            class="d-block p-1 bg-soft-primary mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                                                </div>

                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-sidebar-size" id="sidebar-size-small-hover"
                                                            value="sm-hover">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-size-small-hover">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1">
                                                                        <span
                                                                            class="d-block p-1 bg-soft-primary mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="sidebar-view" style="display: block;">
                                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                                            <p class="text-muted">Choose Default or Detached Sidebar view.</p>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-style" id="sidebar-view-default"
                                                            value="default">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-view-default">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Default</h5>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio"
                                                            name="data-layout-style" id="sidebar-view-detached"
                                                            value="detached">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-view-detached">
                                                            <span class="d-flex h-100 flex-column">
                                                                <span
                                                                    class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                                    <span
                                                                        class="d-block p-1 bg-soft-primary rounded me-1"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                                                                    <span
                                                                        class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                                                                </span>
                                                                <span class="d-flex gap-1 h-100 p-1 px-2">
                                                                    <span class="flex-shrink-0">
                                                                        <span
                                                                            class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                                            <span
                                                                                class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                            <span
                                                                                class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                            <span
                                                                                class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                                <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="sidebar-color" style="display: block;">
                                            <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Color</h6>
                                            <p class="text-muted">Choose Ligth or Dark Sidebar Color.</p>

                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                                            id="sidebar-color-light" value="light">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-color-light">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Light</h5>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-check sidebar-setting card-radio">
                                                        <input class="form-check-input" type="radio" name="data-sidebar"
                                                            id="sidebar-color-dark" value="dark">
                                                        <label class="form-check-label p-0 avatar-md w-100"
                                                            for="sidebar-color-dark">
                                                            <span class="d-flex gap-1 h-100">
                                                                <span class="flex-shrink-0">
                                                                    <span
                                                                        class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                                        <span
                                                                            class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                        <span
                                                                            class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                                                                    </span>
                                                                </span>
                                                                <span class="flex-grow-1">
                                                                    <span class="d-flex h-100 flex-column">
                                                                        <span class="bg-light d-block p-1"></span>
                                                                        <span
                                                                            class="bg-light d-block p-1 mt-auto"></span>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: auto; height: 1528px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                    <div class="simplebar-scrollbar"
                        style="height: 203px; transform: translate3d(0px, 0px, 0px); display: block;"></div>
                </div>
            </div>

        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                </div>
                <div class="col-6">
                    <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Buy
                        Now</a>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->










    <!-- list.js min js -->


    <!--list pagination js-->


    <!-- titcket init js -->


    <!-- Sweet Alerts js -->


    <!-- App js -->
    <div class="flatpickr-calendar rangeMode animate arrowTop arrowLeft" tabindex="-1"
        style="top: 421.766px; left: 959.156px; right: auto;">
        <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
                    </path>
                </svg></span>
            <div class="flatpickr-month">
                <div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month"
                        tabindex="-1">
                        <option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
                        <option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
                        <option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
                        <option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
                        <option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
                        <option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
                        <option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
                        <option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
                        <option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
                        <option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
                        <option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
                        <option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
                    </select>
                    <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1"
                            aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                </div>
            </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
                    </path>
                </svg></span>
        </div>
        <div class="flatpickr-innerContainer">
            <div class="flatpickr-rContainer">
                <div class="flatpickr-weekdays">
                    <div class="flatpickr-weekdaycontainer">
                        <span class="flatpickr-weekday">
                            Sun</span><span class="flatpickr-weekday">Mon</span><span
                            class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span
                            class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span
                            class="flatpickr-weekday">Sat
                        </span>
                    </div>
                </div>
                <div class="flatpickr-days" tabindex="-1">
                    <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022"
                            tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022"
                            tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022"
                            tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022"
                            tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022"
                            tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022"
                            tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022"
                            tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022"
                            tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022"
                            tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022"
                            tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022"
                            tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022"
                            tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022"
                            tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022"
                            tabindex="-1">11</span><span class="flatpickr-day today" aria-label="June 12, 2022"
                            aria-current="date" tabindex="-1">12</span><span class="flatpickr-day selected startRange"
                            aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day inRange"
                            aria-label="June 14, 2022" tabindex="-1">14</span><span
                            class="flatpickr-day selected endRange" aria-label="June 15, 2022"
                            tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022"
                            tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022"
                            tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022"
                            tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022"
                            tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022"
                            tabindex="-1">20</span><span class="flatpickr-day " aria-label="June 21, 2022"
                            tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022"
                            tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022"
                            tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022"
                            tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022"
                            tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022"
                            tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022"
                            tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022"
                            tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022"
                            tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022"
                            tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022"
                            tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022"
                            tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022"
                            tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022"
                            tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022"
                            tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022"
                            tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022"
                            tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022"
                            tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022"
                            tabindex="-1">9</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="flatpickr-calendar animate" tabindex="-1">
        <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
                    </path>
                </svg></span>
            <div class="flatpickr-month">
                <div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month"
                        tabindex="-1">
                        <option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
                        <option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
                        <option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
                        <option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
                        <option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
                        <option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
                        <option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
                        <option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
                        <option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
                        <option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
                        <option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
                        <option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
                    </select>
                    <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1"
                            aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                </div>
            </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
                    </path>
                </svg></span>
        </div>
        <div class="flatpickr-innerContainer">
            <div class="flatpickr-rContainer">
                <div class="flatpickr-weekdays">
                    <div class="flatpickr-weekdaycontainer">
                        <span class="flatpickr-weekday">
                            Sun</span><span class="flatpickr-weekday">Mon</span><span
                            class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span
                            class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span
                            class="flatpickr-weekday">Sat
                        </span>
                    </div>
                </div>
                <div class="flatpickr-days" tabindex="-1">
                    <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022"
                            tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022"
                            tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022"
                            tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022"
                            tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022"
                            tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022"
                            tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022"
                            tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022"
                            tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022"
                            tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022"
                            tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022"
                            tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022"
                            tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022"
                            tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022"
                            tabindex="-1">11</span><span class="flatpickr-day today" aria-label="June 12, 2022"
                            aria-current="date" tabindex="-1">12</span><span class="flatpickr-day "
                            aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day "
                            aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day "
                            aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day "
                            aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day "
                            aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day "
                            aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day "
                            aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day "
                            aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day "
                            aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day "
                            aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day "
                            aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day "
                            aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day "
                            aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day "
                            aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day "
                            aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day "
                            aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day "
                            aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day "
                            aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 9, 2022" tabindex="-1">9</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="flatpickr-calendar animate" tabindex="-1">
        <div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z">
                    </path>
                </svg></span>
            <div class="flatpickr-month">
                <div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month"
                        tabindex="-1">
                        <option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option>
                        <option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option>
                        <option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option>
                        <option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option>
                        <option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option>
                        <option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option>
                        <option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option>
                        <option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option>
                        <option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option>
                        <option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option>
                        <option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option>
                        <option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option>
                    </select>
                    <div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1"
                            aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div>
                </div>
            </div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17">
                    <g></g>
                    <path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z">
                    </path>
                </svg></span>
        </div>
        <div class="flatpickr-innerContainer">
            <div class="flatpickr-rContainer">
                <div class="flatpickr-weekdays">
                    <div class="flatpickr-weekdaycontainer">
                        <span class="flatpickr-weekday">
                            Sun</span><span class="flatpickr-weekday">Mon</span><span
                            class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span
                            class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span
                            class="flatpickr-weekday">Sat
                        </span>
                    </div>
                </div>
                <div class="flatpickr-days" tabindex="-1">
                    <div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022"
                            tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022"
                            tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022"
                            tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022"
                            tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022"
                            tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022"
                            tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022"
                            tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022"
                            tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022"
                            tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022"
                            tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022"
                            tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022"
                            tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022"
                            tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022"
                            tabindex="-1">11</span><span class="flatpickr-day today" aria-label="June 12, 2022"
                            aria-current="date" tabindex="-1">12</span><span class="flatpickr-day "
                            aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day "
                            aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day "
                            aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day "
                            aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day "
                            aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day "
                            aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day "
                            aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day "
                            aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day "
                            aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day "
                            aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day "
                            aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day "
                            aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day "
                            aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day "
                            aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day "
                            aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day "
                            aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day "
                            aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day "
                            aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay"
                            aria-label="July 9, 2022" tabindex="-1">9</span></div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
@php
    $countData = countRecordsForHeaderQuickAccessMenu();
    $pulse = getPulse();
    // dd($countData);
@endphp
<!--begin::Header-->
<div id="kt_app_header" class="app-header ">
    <!--begin::Header container-->
    <!-- Icon For Open SideBar Menu -->
    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
        id="kt_app_header_container">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <!--begin::Svg Icon | path: assets/media/abstract/abs015.svg-->
                <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                            fill="currentColor"></path>
                        <path opacity="0.3"
                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!-- Icon For End SideBar Menu -->

        <!-- Begin Logo -->

        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="/" class="d-lg-none">
                <img alt="Logo" src="{{ asset('assets/images/logo/clatos.png') }}" class="img-fluid h-30px">
            </a>
        </div>
        <!-- End Logo -->
        <!--begin::Header wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <!--begin::Menu wrapper-->
            {{-- @include('layouts/components/alerts') --}}

            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                <!--begin::Menu-->

                <div class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                    id="kt_app_header_menu" data-kt-menu="true">


                    <div class="menu-item me-0 me-lg-2">
                        <div class="d-flex align-items-center gap-2 gap-lg-3">
                            <!--begin::Filter menu-->
                            <!--begin::Menu toggle-->
                            <a href="#"
                                class="btn btn-sm p-2 me-5 btn-flex bg-body btn-light-danger fw-bold text-nowrap"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | path: assets/media/general/gen031.svg-->
                                <span>
                                    <i class="fa-solid fa-heart-pulse"></i>
                                </span>
                                <span>
                                    Pulse :
                                </span>
                                <span>
                                    {{ $pulse->value }}
                                </span>
                            </a>
                            <!--end::Menu toggle-->
                            <!--end::Menu 1-->
                        </div>
                    </div>

                </div>
                <!--end::Menu-->
            </div>

        </div>
        <!--end::Header wrapper-->

        <!--begin::Navbar-->
        <div class="app-navbar flex-shrink-0">

            <!--begin::Search-->
            <div class="app-navbar-item align-items-stretch ms-1 ms-md-3">


                <!--begin::Search-->
                {{-- <!--begin::Menu wrapper-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Toggle-->
                    <button type="button" class="btn  rounded-pill btn-sm btn-outline btn-outline-info" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end" data-kt-menu-offset="30px, 30px">
                        Quick
                    </button>
                    <!--end::Toggle-->

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown rounded-pill menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold  w-lg-50 w-sm-350px" data-kt-menu="true">

                        <!--begin::Menu item-->
                        <div class="menu-item rounded-full p-4 ">
                            <form action="" method="get" class="gap-3 d-flex ">
                                <input class="form-control  rounded-pill" type="text" name="name" id="" placeholder="name">
                                <input class="form-control  rounded-pill" type="text" name="mobile" id="" placeholder="mobile">
                                <button class="btn btn-sm btn-primary rounded-pill">Add Lead</button>
                            </form>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Dropdown wrapper--> --}}

            </div>
            <!--end::Search-->

            <!--begin::Search-->
            <div class="app-navbar-item align-items-stretch ms-1 ms-md-3">


                <!--begin::Search-->
                <!--begin::Menu wrapper-->
                <div class="app-navbar-item ms-1 ms-md-3">
                    <!--begin::Toggle-->
                    <button type="button"
                        class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary  pulse pulse-danger"
                        data-kt-menu-trigger="{default: 'click', lg: 'click'}" data-kt-menu-placement="bottom-end"
                        data-kt-menu-offset="30px, 30px">
                        <span
                            class="svg-icon svg-icon-2x svg-icon-lg-2x svg-icon-gray-500 position-absolute top-50 translate-middle-y ">
                            <span class="ki-duotone ki-magnifier fs-1"><span class="path1"></span><span
                                    class="path2"></span></span>
                        </span>

                    </button>
                    <!--end::Toggle-->

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold  w-100 w-sm-350px"
                        data-kt-menu="true">
                        <form action="{{ route('header.search') }}" method="get">
                            <!--begin::Menu item-->
                            <div class="menu-item p-4">
                                <input class="form-control form-control-solid" type="text" name="search"
                                    id="" placeholder="Search" required minlength="1">

                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item p-4">

                                <!--begin::Row-->
                                <div class="row mb-5" data-kt-buttons="true"
                                    data-kt-buttons-target=".form-check-image, .form-check-input">
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <label class="form-check-image w-100  active">
                                            <div class="form-check-wrapper text-center">
                                                Lead
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid d-none">
                                                <input class="form-check-input" type="radio" checked value="leadId"
                                                    name="type" />
                                                <div class="form-check-label">

                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->


                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <label class="form-check-image w-100 ">
                                            <div class="form-check-wrapper text-center">
                                                Licence Key
                                            </div>

                                            <div class="form-check form-check-custom form-check-solid d-none me-10">
                                                <input class="form-check-input" type="radio" value="licKey"
                                                    name="type" />
                                                <div class="form-check-label">

                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Menu item-->
                            <div class="menu-item p-4 text-end">
                                <button class="btn btn-sm btn-primary">search</button>

                            </div>
                            <!--end::Menu item-->
                        </form>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Dropdown wrapper-->

            </div>
            <!--end::Search-->


            <!--begin::My apps links-->
            <div class="app-navbar-item ms-1 ms-md-3">
                <!--begin::Menu wrapper-->
                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px pulse pulse-danger"
                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                    data-kt-menu-placement="bottom-end">
                    <!--begin::Svg Icon | path: assets/media/general/gen025.svg-->
                    <span class="ki-duotone ki-element-11 fs-2 fs-md-1"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span><span class="path4"></span></span>
                    <span class="pulse-ring border-2"></span>
                    <!--end::Svg Icon-->
                </div>

                <!--begin::My apps-->
                <div class="menu menu-sub menu-sub-dropdown menu-column w-100 w-sm-350px" data-kt-menu="true">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">Quick Access</div>
                            <!--end::Card title-->

                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body py-5">
                            <!--begin::Scroll-->
                            <div class="mh-450px scroll-y me-n5 pe-5">
                                <!--begin::Row-->
                                <div class="justify-content-evenly row">
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <a href="{{ route('leads/newtickets') }}"
                                            class="d-flex flex-column position-relative flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mt-4  mb-3">
                                            <span>
                                                <span class="text-gray-600 material-icons-round ">
                                                    person_add
                                                </span>
                                            </span>
                                            <span class="fw-semibold">New leads</span>
                                            {{-- <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-success">{{ $countData['new'] }}</span> --}}
                                        </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <a href="{{ route('leads/duetickets') }}"
                                            class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4  position-relative px-3 mb-3 mt-4">
                                            <span>
                                                <span class="text-gray-600 material-icons-outlined ">
                                                    calendar_month
                                                </span>

                                            </span>
                                            <span class="fw-semibold">Follow up</span>
                                            {{-- <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-warning">{{ $countData['followup'] }}</span> --}}

                                        </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-4">

                                        <div class="d-flex align-items-center">
                                            <!--begin::Menu toggle-->
                                            <a href="#"
                                                class="menu-link  d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4  position-relative px-3 mb-3 mt-4"
                                                data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                <span>
                                                    <span class="text-gray-600 material-icons-round ">
                                                        support_agent
                                                    </span>
                                                </span>
                                                <span class="fw-semibold">Support</span>
                                                {{-- <span
                                                    class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-primary">{{ $countData['support'] }}</span> --}}

                                            </a>
                                            <!--begin::Menu toggle-->

                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500  menu-state-color fw-semibold py-4 fs-base w-150px"
                                                data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="{{ route('support.pending') }}"
                                                        class="menu-link px-3 py-2">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <span class="text-gray-600 material-icons-outlined">
                                                                downloading
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">
                                                            Pending
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="{{ route('support.processing') }}"
                                                        class="menu-link px-3 py-2">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <span class="text-gray-600 material-icons-outlined">
                                                                running_with_errors
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">
                                                            Processing
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="{{ route('support.complete') }}"
                                                        class="menu-link px-3 py-2">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <span class="text-gray-600 material-icons-outlined">
                                                                check_circle
                                                            </span>
                                                        </span>
                                                        <span class="menu-title">
                                                            Complete
                                                        </span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->

                                        </div>
                                    </div>


                                    <!--end::Col-->

                                    <div class="col-4">
                                        <a href="{{ route('leads/missedcalltickets') }}"
                                            class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary position-relative bg-hover-light rounded py-4 px-3 mb-3">
                                            <span>
                                                <span class=" material-icons-round text-danger">
                                                    phone_missed
                                                </span>

                                            </span>
                                            </i> <span class="fw-semibold">Missed Calls</span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-danger">
                                                0 {{-- {{ $countData['missed']  ?? '0'}} --}}
                                            </span>

                                        </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <a href="{{ route('leads/incomingcalltickets') }}"
                                            class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary position-relative bg-hover-light rounded py-4 px-3 mb-3">
                                            <span>
                                                <span class="text-gray-600 material-icons-round">
                                                    phone_callback
                                                </span>
                                            </span>
                                            <span class="fw-semibold">Incoming</span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-warning">
                                                0 {{-- {{ $countData['incoming'] }} --}}
                                            </span>

                                        </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <a href="{{ route('leads/upcomingtickets') }}"
                                            class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary position-relative bg-hover-light rounded py-4 px-3 mb-3">
                                            <span>
                                                <span class="text-gray-600 material-icons-round">
                                                    toc
                                                </span>

                                            </span>
                                            <span class="fw-semibold">Upcoming</span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-warning">
                                                0 {{-- {{ $countData['upcoming'] }} --}}
                                            </span>

                                        </a>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-4">
                                        <a href="#"
                                            class="menu-link  d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4  position-relative px-3 mb-3 mt-4"
                                            data-kt-menu-trigger="{default:'click', lg: 'hover'}"
                                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                            <span>
                                                <span class="text-gray-600 material-icons-outlined">
                                                    list_alt
                                                </span>
                                            </span>
                                            <span class="fw-semibold">My Tasks</span>
                                            <span
                                                class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-info">
                                                0 {{-- {{ $countData['task'] }} --}}
                                            </span>
                                        </a>



                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500  menu-state-color fw-semibold py-4 fs-base w-150px"
                                            data-kt-menu="true" data-kt-element="theme-mode-menu">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="{{ route('task.add') }}" class="menu-link px-3 py-2">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <span class="text-gray-600 material-icons-outlined">
                                                            add_circle
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">
                                                        Add Task
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="menu-item px-3 my-0">
                                                <a href="{{ route('task.all') }}" class="menu-link px-3 py-2">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <span class="text-gray-600 material-icons-outlined">
                                                            fact_check
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">
                                                        All Task
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="{{ route('task.pending') }}" class="menu-link px-3 py-2">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <span class="text-gray-600 material-icons-outlined">
                                                            incomplete_circle
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">
                                                        Pending Task
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 my-0">
                                                <a href="{{ route('task.complete') }}" class="menu-link px-3 py-2">
                                                    <span class="menu-icon" data-kt-element="icon">
                                                        <span class="text-gray-600 material-icons-outlined">
                                                            published_with_changes
                                                        </span>
                                                    </span>
                                                    <span class="menu-title">
                                                        Complete Task
                                                    </span>
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::My apps-->
                <!--end::Menu wrapper-->
            </div>
            <!--end::My apps links-->
            @guest
                @if (Route::has('login'))
                    <div class="app-navbar-item ms-1 ms-md-3">
                        <span class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </span>
                    </div>
                @endif

                @if (Route::has('register'))
                    <div class="app-navbar-item ms-1 ms-md-3">
                        <span class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </span>
                    </div>
                @endif
            @else
                <!--begin::User menu-->
                <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="{{ asset('assets/media/avatars/avatar.jpg') }}" alt="user">
                    </div>

                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('assets/media/avatars/avatar.jpg') }}">
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ auth()->user()->name ?? '' }} <span
                                            class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                    </div>

                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        {{ auth()->user()->email ?? '' }} </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="/" class="menu-link px-5">
                                My Profile
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a class="menu-link px-5" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                        <!--end::Menu item-->


                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User menu-->
                @endif

                <!--begin::Header menu toggle-->
                <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-color-primary w-30px h-30px w-md-35px h-md-35px"
                        id="kt_app_header_menu_toggle">
                        <!--begin::Svg Icon | path: assets/media/text/txt001.svg-->
                        <span class="svg-icon svg-icon-2 svg-icon-md-1"><svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                    fill="currentColor"></path>
                                <path opacity="0.3"
                                    d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                    fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Header menu toggle-->
            </div>
            <!--end::Navbar-->

        </div>
        <!--end::Header container-->
    </div>
    <!--End::Header-->

    @section('scripts')
    @endsection

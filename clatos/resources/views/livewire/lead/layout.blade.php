@extends('layouts.app')
@section('content')

    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="d-none d-lg-flex flex-column flex-lg-row-auto w-100 w-lg-275px" data-kt-drawer="true"
            data-kt-drawer-name="inbox-aside" data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_inbox_aside_toggle">

            <!--begin::Sticky aside-->
            <div class="card card-flush mb-0 h-lg-650px  overflow-auto" data-kt-sticky="true"
                data-kt-sticky-name="inbox-aside-sticky" data-kt-sticky-offset="{default: false, xl: '100px'}"
                data-kt-sticky-width="{lg: '275px'}" data-kt-sticky-left="auto" data-kt-sticky-top="100px"
                data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                <!--begin::Aside content-->
                <div class="card-body">

                    <!--begin::Menu-->
                    <div
                        class="menu menu-column menu-gray-600 menu-rounded menu-state-bg menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary mb-5">

                        <!--begin::Menu item-->
                        <div class="menu-item mb-3 ">
                            <a href="{{ route('lead.profile', ['lead' => $lead->id]) }}"
                                class="menu-link py-3 opacity-75 {{ Route::is('lead.profile') ? 'active' : '' }}">
                                <span class="menu-icon   ">
                                    <i class="ki-duotone ki-user  fs-2 me-3">
                                        <i class="path1"></i>
                                        <i class="path2"></i>
                                    </i>
                                </span>
                                <span class="menu-title  fw-bold">Profile</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.contacts', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.contacts') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        contacts
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Contacts</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.timeline', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.timeline') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        timeline
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Timeline</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.invoices', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.invoices') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        receipt
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Invoices</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.tickets', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.tickets') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        local_activity
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Support Tickets</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.callLogs', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.callLogs') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        view_timeline
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Call Logs</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.followUps', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.followUps') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        touch_app
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Follow ups</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.comments', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.comments') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        rate_review
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Commnets</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.emails', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.emails') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        email
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">E-Mail</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.orders', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.orders') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        table_view
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Orders</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.transaction', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.transaction') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        receipt_long
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Transaction</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.documents', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.documents') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        document_scanner
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Docs. </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.licence', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.licence') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        key
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">License</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.brands', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.brands') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        folder_zip
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Brands</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.projects', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.projects') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        business_center
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">Projects</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item mb-3">
                            <a href="{{ route('lead.hardwarechange', ['lead' => $lead->id]) }}"
                                class="menu-link py-3   {{ Route::is('lead.hardwarechange') ? 'active ' : '' }}">
                                <span class="menu-icon">
                                    <span class="material-icons-outlined">
                                        memory
                                    </span>
                                </span>
                                <span class="menu-title  fw-bold">H/W Changes</span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                    </div>
                    <!--end::Menu-->

                </div>
                <!--end::Aside content-->
            </div>
            <!--end::Sticky aside-->
        </div>
        <!--end::Sidebar-->

        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">

            <!--begin::Card-->
            <div class="card bg-transparent ">
                <div class=" justify-content-end   d-lg-none d-sm-inline-block">


                    <!--begin::Actions-->

                    <div class=" ps-6">


                        <div class="d-flex align-items-center flex-wrap gap-2">

                            <!--begin::Toggle-->
                            <a href="#"
                                class="btn btn-sm btn-icon btn-color-primary btn-light btn-active-light-primary d-lg-none"
                                data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top"
                                id="kt_inbox_aside_toggle" aria-label="Toggle inbox menu"
                                data-bs-original-title="Toggle inbox menu" data-kt-initialized="1">
                                <i class="ki-duotone ki-burger-menu-2 fs-3 m-0"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span
                                        class="path4"></span><span class="path5"></span><span
                                        class="path6"></span><span class="path7"></span><span
                                        class="path8"></span><span class="path9"></span><span
                                        class="path10"></span></i>
                            </a>
                            <!--end::Toggle-->
                        </div>
                    </div>
                    <!--end::Actions-->
                </div>

                <div class="card-body p-0">

                    <!--begin::Table-->
                    <div id="" class=" ">
                        @yield('lead-content')
                    </div>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card-->

        </div>
        <!--end::Content-->
    </div>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item ">
        <a href="{{ route('leads') }}" class="text-gray-600 text-hover-gray-900">
            Leads &nbsp;
        </a>
    </li>
    <li class="breadcrumb-item text-gray-600">
        <a href="{{ route('lead.profile', ['lead' => $lead->id]) }}" class="text-gray-600 text-hover-gray-900">
            {{ $lead->name }} ({{ $lead->id }})&nbsp;
        </a>
    </li>
@endsection
@section('title', '| Lead Details')

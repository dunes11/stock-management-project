@php
    $countData = countRecordsForSidebarMenu();
    //dd($countData->new);
@endphp
<!-- Begin Sidebar -->

<div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">


    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="/">
            <img alt="Logo" src="{{ asset('assets/images/logo/clatos-light.png') }}"
                class="h-50px app-sidebar-logo-default" />
            <img alt="Logo" src="{{ asset('assets/images/logo/favicon.png') }}"
                class=" img-fluid app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->

        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">

            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180"><svg width="24" height="24" viewBox="0 0 24 24"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">

        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true"
            style="height: 15px;">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round">
                                home
                            </span>
                            <!--end Icon-->
                        </span>
                        <span class="menu-title color-white">Customer Panel</span>
                    </span>
                    <!--end:Menu link-->
                </div>
                <!--End:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item ">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::current()->getName() == 'dashboard' ? 'active ' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="menu-icon">
                            <!-- Begin Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect x="2" y="2" width="9" height="9" rx="2"
                                    fill="currentColor"></rect>
                                <rect opacity="0.3" x="13" y="2" width="9" height="9"
                                    rx="2" fill="currentColor"></rect>
                                <rect opacity="0.3" x="13" y="13" width="9" height="9"
                                    rx="2" fill="currentColor"></rect>
                                <rect opacity="0.3" x="2" y="13" width="9" height="9"
                                    rx="2" fill="currentColor"></rect>
                            </svg>
                            <!--end Icon-->
                        </span>
                        <span class="menu-title">Dashboard</span>
                        <!--end:Menu link-->
                    </a>
                </div>
                <!--End:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-chart-line-up fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <!--end::Svg Icon-->
                        </span><span class="menu-title color-white">Performance</span></span>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round fs-2x">
                                headset_mic
                            </span>
                            <!--end Icon-->

                        </span><span class="menu-title color-white">Active Calls</span></span>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item hardwarechange-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a href="{{ route('hardwarechange') }}"
                        class="menu-link {{ Route::is('lead.hardwarechange') ? 'active ' : '' }}">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-technology fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                                <i class="path6"></i>
                                <i class="path7"></i>
                                <i class="path8"></i>
                                <i class="path9"></i>
                            </i>
                            <!--end Icon-->
                        </span>
                        <span class="menu-title color-white">H/W Changes</span><span
                            class="badge badge-square badge-info">{{ $countData['hwchange'] }}</span></a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item hardwarechange -->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->

                    <a class="menu-link {{ Route::is('leads/closeticket') ? 'active ' : '' }} "
                        href="{{ route('leads/closeticket') }}">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round fs-2x">
                                person_remove
                            </span>
                            <!--end Icon-->
                        </span>
                        <span class="menu-title color-white">Close Ticket</span>
                        <span class="badge badge-square badge-danger">{{ $countData['closeTkt'] }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link" href="{{ route('leadgrabrequest') }}">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="bi bi-person-lines-fill fs-2x"></i>
                            <!--end Icon-->
                        </span>
                        <span class="menu-title color-white">Lead Grab Request</span>
                        <span class="badge badge-square badge-success">{{ $countData['grabLead'] }}</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item unassigned -->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('unassigned') ? 'active ' : '' }}"
                        href="{{ route('unassigned') }}">
                        <span class="menu-icon color-white mr-13px">
                            <span class="material-icons-round fs-2x">
                                manage_accounts
                            </span>
                        </span>
                        <span class="menu-title color-white">Unassigned Leads</span>
                        <span class="badge badge-square badge-warning">{{ $countData['unassigned'] }}</span>
                        <!--end:Menu link-->

                    </a>
                </div>
                <!--end:Menu item unassigned -->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('notincrm') ? 'active ' : '' }}"
                        href="{{ route('notincrm') }}"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-abstract-11 fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <!--end Icon-->
                        </span><span class="menu-title color-white">Not in CRM</span><span
                            class="badge badge-square badge-secondary">{{ $countData['notInCrm'] }}</span></a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('emailapproval') ? 'active ' : '' }}"
                        href="{{ route('emailapproval') }}">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-sms fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Email Approvel</span><span
                            class="badge badge-square badge-light ">{{ $countData['emailApproval'] }}</span></span>
                    </a>

                </div>
                <!--end:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('lead.add') ? 'active ' : '' }}"
                        href="{{ route('lead.add') }}">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round fs-2x">
                                person_add
                            </span>
                            <!--end::Icon-->
                        </span>
                        <span class="menu-title color-white">Add Lead</span>
                        {{-- <span class="badge badge-square badge-light ">5</span> --}}
                    </a>

                </div>
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('leads') ? 'active ' : '' }}" href="{{ route('leads') }}">
                        <span class="menu-icon color-white mr-13px">
                            <i class="ki-duotone ki-people fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title color-white">Leads & Customer </span>
                    </a>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-cube-2 fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Treasure Box</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Expired</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Followup</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-bucket fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                            </i>
                            <!--end:: Icon-->
                        </span>
                        <span class="menu-title color-white">Graphic</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Brand</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Brand Attachements</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Category</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Project</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Unassigned</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Project Chat</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Project Chat</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Project Attachement</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Project Deliverable</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Plan</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Plan feature</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Assign Lead Graphic</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>

                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-cheque fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                                <i class="path4"></i>
                                <i class="path5"></i>
                                <i class="path6"></i>
                                <i class="path7"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Invoices</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">All Invoices</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Paid Invoices</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Un-Paid Invoices</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Unapproved Invoices</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Invoice Cancelled</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">paid Invoices</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('orders') ? 'active ' : '' }}" href="{{ route('orders') }}"
                        target="_blank"><span class="menu-icon color-white mr-13px">
                            <i class="ki-duotone ki-brifecase-tick fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i></span>
                        <span class="menu-title color-white">Orders</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ Route::is('transaction.list') ? 'active ' : '' }}"
                        href="{{ route('transaction.list') }}"><span class="menu-icon color-white mr-13px">
                            <i class="ki-duotone ki-bank fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                        </span><span class="menu-title color-white">Transactions</span></a>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round fs-2x">
                                query_stats
                            </span>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Sales Forcast</span></span>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-dollar fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            <!--end:: Icon-->
                            <!--end::Svg Icon-->
                        </span><span class="menu-title color-white">Transaction USD</span></span>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-key fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Licenses</span></span>
                    <!--end:Menu link-->

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ Route::is('users.index') ? 'show' : '' }} {{ Route::is('roles.index') ? 'show' : '' }}">
                    <!--begin:Menu link-->
                    <span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-profile-circle fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">User</span><span class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        {{-- @can('user-list') --}}
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link {{ Route::is('users.index') ? 'active' : '' }}"
                                href="{{ route('users.index') }}"><span class="menu-bullet"><span
                                        class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Users</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        {{-- @endcan --}}
                        {{-- @can('role-list') --}}
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link {{ Route::is('roles.index') ? 'active' : '' }}"
                                href="{{ route('roles.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span>
                                </span><span class="menu-title color-white">Roles</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        {{-- @endcan --}}
                    </div>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <span>
                                <!-- Begin Icon -->
                                <i class="ki-duotone ki-parcel fs-2x">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                    <i class="path4"></i>
                                    <i class="path5"></i>
                                </i>
                                <!--end:: Icon-->
                            </span>
                        </span><span class="menu-title color-white">Products</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->

                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Products</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Products Variation</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Products Gallery</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Review</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link">
                        <span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-chart-pie-3 fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                                <i class="path3"></i>
                            </i>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Reports</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Performance</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead Source Wise</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Product Wise</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead Interaction Report</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Call Calender</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Email Outgoing</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">License Wise</span></a>
                            <!--end:Menu link-->
                        </div>
                    </div>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <span>
                                <!-- Begin Icon -->
                                <i class="bi bi-telephone-fill fs-2"></i>
                                <!--end:: Icon-->
                            </span>
                        </span><span class="menu-title color-white">Call Logs</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Ai Call Log</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Missed</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Incoming</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Outgoing</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->

                        <!--end:Menu item-->
                    </div>

                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <i class="ki-duotone ki-gear fs-2x">
                                <i class="path1"></i>
                                <i class="path2"></i>
                            </i>

                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Settings</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Announcements</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Companies</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Countries</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Global Settings</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead For</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead Sources</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Lead Status</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Payment Modes</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">User Roles</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <!--end:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">User Levels Permission</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--begin:Menu item-->
                        <!--end:Menu item-->
                    </div>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <!-- Begin Icon -->
                            <span class="material-icons-round">
                                style
                            </span>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Templates</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Email Header</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Email Template</span></a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">Email Signature</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">SMS Template</span></a>
                            <!--end:Menu link-->
                        </div>
                        <div class="menu-item">
                            <!--begin:Menu link--><a class="menu-link" href="{{ url('#') }}"><span
                                    class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                    class="menu-title color-white">SMS Category</span></a>
                            <!--end:Menu link-->
                        </div>

                        <!--end:Menu item-->
                    </div>
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link--><span class="menu-link"><span class="menu-icon color-white mr-13px">
                            <span>
                                <!-- Begin Icon -->
                                <i class="bi bi-emoji-sunglasses"></i>
                            </span>
                            <!--end:: Icon-->
                        </span><span class="menu-title color-white">Others</span><span
                            class="menu-arrow"></span></span>
                    <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
                <!--begin:Menu item-->
            </div>
            <!--end::Menu-->
            <!--end::Menu wrapper-->
        </div>
        <!--end::sidebar menu-->
    </div>
    <!--end::sidebar menu-->
</div>
<!-- End Sidebar -->

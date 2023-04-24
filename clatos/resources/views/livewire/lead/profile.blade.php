<div>    
    <div class="card-body p-2">
        <div class="row">
            <div class="col-lg-2 col-sm-1">
                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold w-250px"
                    data-kt-menu="true">

                    <!--begin::Menu item-->
                    <div class="menu-item ">
                        <a href="{{ route('lead.profile',['lead' => $lead->id]) }}"
                            class="menu-link py-3  {{ Route::is('lead.profile') ? 'active ' : '' }}">
                            <span class="menu-icon">
                                <span class="material-icons-outlined">
                                    account_circle
                                </span>
                            </span>
                            <span class="menu-title">Profile</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="{{ route('lead.contacts', ['lead' => $lead->id]) }}"
                            class="menu-link py-3   {{ Route::is('lead.contacts') ? 'active ' : '' }}">
                            <span class="menu-icon">
                                <span class="material-icons-outlined">
                                    contacts
                                </span>
                            </span>
                            <span class="menu-title">Contacts</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="{{ route('lead.timeline', ['lead' => $lead->id]) }}"
                            class="menu-link py-3   {{ Route::is('lead.timeline') ? 'active ' : '' }}">
                            <span class="menu-icon">
                                <span class="material-icons-outlined">
                                    timeline
                                </span>
                            </span>
                            <span class="menu-title">Timeline</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="{{ route('lead.invoices', ['lead' => $lead->id]) }}"
                            class="menu-link py-3   {{ Route::is('lead.invoices') ? 'active ' : '' }}">
                            <span class="menu-icon">
                                <span class="material-icons-outlined">
                                    receipt
                                </span>
                            </span>
                            <span class="menu-title">Invoices</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="{{ route('lead.profile', ['lead' => $lead->id]) }}"
                            class="menu-link py-3   {{ Route::is('lead.tickets') ? 'active ' : '' }}">
                            <span class="menu-icon">
                                <span class="material-icons-outlined">
                                    local_activity
                                </span>
                            </span>
                            <span class="menu-title">Tickets</span>
                        </a>
                    </div>
                    <!--end::Menu item-->

                </div>
                <!--end::Menu-->
            </div>
            <div class="col col-sm-10">
                <div class="card  m-3 mh-100 h-lg-650px overflow-auto h-100">
                    @include('livewire.lead.pages.profile')
                </div>
            </div>
        </div>
    </div>
</div>

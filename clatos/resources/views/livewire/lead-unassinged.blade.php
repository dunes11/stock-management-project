@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Unassigned_Leads &nbsp;</li>
    <!--end::Item-->
@endsection

<div>
    @section('css')
        <style>
            /* .reports_to {
                        display: none;
                    } */
        </style>
    @endsection
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search" wire:model="search_data"
                        wire:keydown.enter="search('{{ $searchData }}')"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers">
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <div class="m-0" data-select2-id="select2-data-124-md0j">
                        <!--begin::Menu toggle-->

                        <button type="button" class="btn btn-flex btn-light-primary me-3" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon--> Filter
                        </button>
                        <!--end::Menu toggle-->
                        <!--begin::Menu Filter -->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_640c70f232079" style=""
                            data-select2-id="select2-data-kt_menu_640c70f232079">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bold">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            <!--begin::Form-->
                            <form wire:submit.prevent="filter">
                                <div class="px-7 py-5">
                                    <!-- Begin Date Picker -->
                                    <div class="mb-10">
                                        <label for="exampleSelect1">Select Gen.Date</label>
                                        <input class="form-control flatpickr-input" wire:model.delay="date"
                                            name="between" placeholder="Pick Dates" id="kt_datepicker_1">
                                    </div>
                                    <!-- End Date Picker -->
                                    <!-- Begin Lead name selector -->

                                    <div class="mb-10">
                                        <div>
                                            <label for="exampleSelect1">Example select</label>
                                            <select class="form-control" id="exampleSelect1" wire:model.defer="name">
                                                <option value="">Select an option</option>
                                                @foreach ($leadUnassigned as $leadUnassignedData)
                                                    <option value="{{ $leadUnassignedData->name }}">
                                                        {{ $leadUnassignedData->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Lead name selector -->

                                    <!-- Begin Lead_for  selector -->
                                    <div class="mb-10">
                                        <div>
                                            <label for="exampleSelect1">Example select</label>
                                            <select class="form-control" id="exampleSelect1"
                                                wire:model.defer="queryFor">
                                                <option value="">Select an option</option>
                                                @foreach ($leadFor as $leads_for)
                                                    <option value="{{ $leads_for['name'] }}">
                                                        {{ $leads_for['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End Lead_for selector -->

                                    <div class="d-flex justify-content-end">
                                        <button type="reset" wire:click="resetFilter"
                                            class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</button>

                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                    <!--end::Menu filter -->
                </div>
                <!--end::Filter-->
                <!--Begin::EditUnassigned Button-->

                <button onclick="edit()" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                    data-bs-target="#kt_customers_export_modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                            <path
                                d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                fill="currentColor"></path>
                            <path opacity="0.3"
                                d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon--> Edit Lead
                </button>
                <!--End::EditUnassigned Button-->

                <!--begin::import-->
                <a href="#" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                    data-bs-target="#kt_customers_import_modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                    <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
                            <path
                                d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                fill="currentColor"></path>
                            <path opacity="0.3"
                                d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon--> Import
                </a>
                <!--end::import-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                        id="kt_customers_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                    aria-label="" style="width: 29.8977px;">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_customers_table .form-check-input"
                                            value="1">
                                    </div>
                                </th>
                                <th wire:click="sortBy('date')" class="min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                    aria-label="Customer Name: activate to sort column ascending"
                                    style="width: 140.17px;">
                                    Gen.Date</th>
                                <th wire:click="sortBy('name')" class="min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                    aria-label="Email: activate to sort column ascending" style="width: 173.852px;">
                                    Name</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1"
                                    aria-label="Company: activate to sort column ascending" style="width: 154.239px;">
                                    Mobile</th>
                                <th wire:click="check()" class="min-w-125px sorting" tabindex="0"
                                    aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                    aria-label="Payment Method: activate to sort column ascending"
                                    style="width: 142.386px;">Query For</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1"
                                    aria-label="Created Date: activate to sort column ascending"
                                    style="width: 182.591px;">
                                    Reports To</th>
                                <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                    rowspan="1" colspan="1"
                                    aria-label="Created Date: activate to sort column ascending"
                                    style="width: 182.591px;">
                                    Actions
                                </th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->

                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            <!--begin::Table row-->
                            @foreach ($leadUnassigned as $leadUnassignedData)
                                <tr class="odd">
                                    <!--begin::Checkbox-->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1">
                                        </div>
                                    </td>
                                    <!--end::Checkbox-->

                                    <!--begin::Date--->
                                    <td>
                                        <a href="#" class="text-gray-800 text-hover-primary mb-1">
                                            {{ date(env('DATEFORMATE') . ' H:i:s', strtotime($leadUnassignedData->datetime)) }}
                                        </a>
                                    </td>
                                    <!--end::Date--->

                                    <!--begin::name--->
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $leadUnassignedData->name }}</a>
                                    </td>
                                    <!--end::name--->

                                    <!--begin::mobile --->
                                    <td>
                                        <a href="#"
                                            class="text-gray-600 text-hover-primary mb-1">{{ $leadUnassignedData->mobile }}</a>

                                    </td>
                                    <!--end::mobile --->

                                    <!--begin::Leads_for Name--->
                                    <td>
                                        {{ optional($leadUnassignedData->leads_for)->name }}

                                    </td>
                                    <!--end::Leads_for Name--->

                                    <!--begin::reports to(users_name)--->
                                    <td class="reports_to">
                                        <select class="form-control reports_to">
                                            @foreach ($user as $users)
                                                <option wire:click="edit({{ $users['name'] }})">
                                                    {{ $users['name'] ?? 'Null' }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <!--end::reports to(users_name)--->

                                    <!-- begin Action Button -->
                                    <td>
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/" class="menu-link px-3">
                                                    Edit
                                                </a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/" class="menu-link px-3">
                                                    view
                                                </a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!-- end Action Button -->


                                </tr>
                            @endforeach
                            <!--end::Table row-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                {{-- {{ $leadUnassigned->links('pagination::bootstrap-5') }} --}}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>


    @section('scripts')
        <script>
            $("#kt_datepicker_1").flatpickr({
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
                mode: "range"
            });
        </script>
        <script>
            function edit() {
                var elements = document.querySelectorAll('.reports_to');
                for (var i = 0; i < elements.length; i++) {
                    elements[i].style.display = 'block';
                }
            }
        </script>
    @endsection

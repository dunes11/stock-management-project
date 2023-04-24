@php
    //dd($orders);
@endphp

@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Orders &nbsp;</li>
    <!--end::Item-->
@endsection
<div>
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5" data-select2-id="select2-data-124-rboh">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4"><svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon--> <input type="text" data-kt-ecommerce-order-filter="search"
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search Order">
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5" data-select2-id="select2-data-123-h473">
            <!--begin::Flatpickr-->
            <div class="input-group w-250px">

                <input class="form-control form-control-solid rounded rounded-end-0 flatpickr-input"
                    placeholder="Pick date range" id="kt_ecommerce_sales_flatpickr" type="hidden">
                <button class="btn btn-icon btn-light" id="kt_ecommerce_sales_flatpickr_clear">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr088.svg-->
                    <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2"
                                rx="1" transform="rotate(-45 7.05025 15.5356)" fill="currentColor"></rect>
                            <rect x="8.46447" y="7.05029" width="12" height="2" rx="1"
                                transform="rotate(45 8.46447 7.05029)" fill="currentColor"></rect>
                        </svg></span>
                    <!--end::Svg Icon-->
                </button>
            </div>
            <!--end::Flatpickr-->
            <!--Begin ::Status Dropdown wrapper-->
            <div>
                <!--begin::Toggle-->
                <button type="button" class="btn  btn-light rotate" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom" data-kt-menu-offset="30px, 30px">
                    Status
                    <span class="svg-icon svg-icon-3 rotate-180 ms-3 me-0"><i class="fa-solid fa-caret-down"></i></span>
                </button>
                <!--end::Toggle-->

                <!--begin::Menu-->
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            All
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            Approved
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            UnApproved
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="#" class="menu-link px-3">
                            Cancelled
                        </a>
                    </div>
                    <!--end::Menu item-->

                </div>
                <!--end::Menu-->
            </div>
            <!--end::Dropdown wrapper-->

            <!--begin::Add product-->
            <a href="#" class="btn btn-primary" target="_blank">
                Add Order
            </a>
            <!--end::Add product-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">

        <!--begin::Table-->
        <div id="kt_ecommerce_sales_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                    id="kt_ecommerce_sales_table">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1" aria-label=""
                                style="width: 29.8906px;">
                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                        data-kt-check-target="#kt_ecommerce_sales_table .form-check-input"
                                        value="1">
                                </div>
                            </th>
                            <th wire:click="sortBy('order.id')" class="min-w-100px sorting" tabindex="0"
                                aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                aria-label="Order ID: activate to sort column ascending" style="width: 110.781px;">ID
                            </th>

                            <th wire:click="sortBy('lead.name')" class="min-w-175px sorting" tabindex="0"
                                aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                aria-label="Customer: activate to sort column ascending" style="width: 226.281px;">
                                Customer</th>
                               
                            
                            <th wire:click="sortBy('order.isApproved')" class="text-end min-w-70px sorting"
                                tabindex="0" aria-controls="kt_ecommerce_sales_table" rowspan="1"
                                colspan="1" aria-label="Status: activate to sort column ascending"
                                style="width: 80.6406px;">
                                Status
                            </th>
                            <th wire:click="sortBy('invoice_id')" class="text-end min-w-100px sorting" tabindex="0"
                                aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                aria-label="Total: activate to sort column ascending" style="width: 110.781px;">
                                Invoice
                            </th>
                            <th wire:click="sortBy('order.date')" class="text-end min-w-100px sorting" tabindex="0"
                                aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                aria-label="Date Added: activate to sort column ascending" style="width: 110.781px;">
                                Date Added</th>

                            <th wire:click="sortBy('user.name')" class="text-end min-w-100px sorting" tabindex="0"
                                aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                aria-label="Date Added: activate to sort column ascending" style="width: 110.781px;">
                                Manager</th>

                            <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                aria-label="Actions" style="width: 110.812px;">Actions</th>
                            <th>other</th>

                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($orders as $orderData)
                            <div class="accordion" id="accordionExample{{ $orderData->id }}">
                                <div class="accordion-item">

                                    <tr class="odd">
                                        <!--begin::Checkbox-->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <!--end::Checkbox-->

                                        <!--begin::Order ID--->
                                        <td data-kt-ecommerce-order-filter="order_id" sortable direaction="asc">
                                            <a href="/" class="text-gray-800 text-hover-primary fw-bold">
                                                {{ $orderData->id }} </a>
                                        </td>
                                        <!--end::Order ID--->

                                        <!--begin::Customer--->
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <a href="/">
                                                        <div class="symbol-label fs-3 bg-light-success text-success">
                                                            {{ Str::limit($orderData->lead->name, 1, '') }} </div>
                                                    </a>
                                                </div>
                                                <!--end::Avatar-->

                                                <div class="ms-5">
                                                    <!--begin::Title-->
                                                    <a href="/"
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ $orderData->lead->name }}</a>
                                                    <!--end::Title-->
                                                </div>
                                            </div>
                                        </td>
                                        <!--end::Customer--->

                                        <!--begin::Status--->
                                        <td class="text-end pe-0" data-order="Delivered">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">
                                                @if ($orderData->isApproved == 0)
                                                    Unapproved
                                                @else
                                                    Approved
                                                @endif
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status--->

                                        <!--begin::Invoice Number--->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">INV-451362</span>
                                        </td>
                                        <!--end::Invoice Number--->

                                        <!--begin::Date Added--->
                                        <td class="text-end" data-order="2023-03-04">
                                            <span
                                                class="fw-bold">{{ date('j M, Y', strtotime($orderData->date)) }}</span>
                                        </td>
                                        <!--end::Date Added--->

                                        <!--begin::Account Manager--->
                                        <td class="text-end" data-order="2023-03-10">
                                            <span class="fw-bold">{{ $orderData->accountManager->name }}</span>
                                        </td>
                                        <!--end::Account Manager--->

                                        <!--begin::Action--->
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0"><svg width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
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
                                                        View
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/" class="menu-link px-3">
                                                        Edit
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3"
                                                        data-kt-ecommerce-order-filter="delete_row">
                                                        Delete
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                        <!--end::Action--->

                                        <td class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">Itemss</button>
                                        </td>
                                    </tr>
                                    <div id="collapseOne" class="accordion-collapse collapse hide"
                                        aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample{{ $orderData->id }}
                                    ">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>

        </div>
        <!--end::Table-->
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
    <!--end::Card body-->
</div>
@section('scripts')
    <script>
        $("#kt_ecommerce_sales_flatpickr").flatpickr();
    </script>
@endsection

@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600 fs-1">
        Orders &nbsp;</li>
@endsection
<div>
<div>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr wire:key="order_{{ $order->id }}">
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>
                    <button class="accordion-button fs-6 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#order_{{ $order->id }}_items" aria-expanded="false" aria-controls="order_{{ $order->id }}_items" wire:click.stop="getOrderItem({{ $order->id }})">
                        Show Order Items
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div id="order_{{ $order->id }}_items" wire:ignore class="accordion-collapse collapse" aria-labelledby="order_{{ $order->id }}_items" wire:loading>
                        <div class="accordion-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Period</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($orderItemData)
                                    @foreach ($orderItemData as $orderItem)
                                    <tr>
                                        <td>{{ $orderItem->productName->name }}</td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>{{ $orderItem->period }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



    <div id="kt_app_content_container" class="app-container  container-xxl ">
        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <!--Begin ::Tab-->
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 mb-2">
                    <li class="nav-item ">
                        <a class="nav-link text-active-primary py-5 me-6 active " data-bs-toggle="tab"
                            href="#kt_tab_pane_7">All
                            Orders
                            <span class="badge badge-circle badge-outline  badge-primary ms-2">5</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                            href="#kt_tab_pane_8">Add Orders
                            <span class="badge badge-circle badge-outline badge-primary ms-2">5</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                            href="#kt_tab_pane_9">Continue
                            <span class="badge badge-circle badge-outline badge-primary ms-2">5</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-active-primary py-5 me-6 " data-bs-toggle="tab"
                            href="#kt_tab_pane_9">Cancelled
                            <span class="badge badge-circle badge-outline badge-primary ms-2">5</span></a>
                    </li>
                </ul>
                <!--End ::Tab-->
            </div>
            <div class="card-body border-0 pt-6 align-items-center py-5 gap-2 gap-md-5">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active btn-primary" id="kt_tab_pane_7" role="tabpanel">

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6"><span
                                        class="path1"></span><span class="path2"></span></i>
                                <input type="text" data-kt-docs-table-filter="search"
                                    wire:model.debounce.500="search"
                                    class="form-control form-control-solid w-250px ps-15 me-2"
                                    placeholder="Search orders" />
                                <!--end::Search-->

                                <!--Begin ::Button Delete-->
                                <button type="button" wire:click="confirmMultipleDelete()"
                                    class="btn btn-icon btn-light-danger me-2" data-bs-toggle="tooltip"
                                    title="Coming Soon">
                                    <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                        delete_forever
                                    </span>
                                </button>
                                <!--End ::Button Delete-->

                            </div>

                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">


                                <!--begin::filter -->
                                <div>
                                    <button type="button" class="btn btn-primary rotate me-2"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-offset="40px, 40px">
                                        <i class="ki-duotone ki-filter fs-2"><span class="path1"></span><span
                                                class="path2"></span></i>Filter
                                    </button>

                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-300px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Filter Options
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <form wire:submit.prevent="onFilterSubmit()">
                                            <!--begin::Menu separator-->
                                            <div class="separator mb-3 opacity-75"></div>
                                            <!--end::Menu separator-->

                                            <!--begin::date item-->
                                            <div class="menu-item px-3 mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input class="form-control" wire:model.defer='filter.date'
                                                    value="{{ $filter['date'] ?? null }}" placeholder="Pick a date"
                                                    id="kt_datepicker_1" />
                                            </div>
                                            <!--end::date item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 mb-3">
                                                <label for="Lead Name">Remarks</label>
                                                <input class="form-control" type="text"
                                                    value="{{ $filter['remarks'] ?? null }}"
                                                    wire:model.defer='filter.remarks' placeholder="Remarks">
                                            </div>
                                            <!--end::Menu item-->


                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 mb-3">
                                                <label for="Lead Name">Lead Name</label>
                                                <select class="form-select " value="{{ $filter['leadName'] ?? null }}"
                                                    wire:model.defer='filter.lead_id'
                                                    data-placeholder="Select an option">
                                                    <option>Select Lead Name</option>
                                                    @foreach ($orders as $orders_Data)
                                                        <option value="{{ $orders_Data->lead_id }}">
                                                            {{ $orders_Data->lead->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3 mb-3">
                                                <label for="Lead Name">Account Manager Name</label>

                                                <select class="form-select"
                                                    value="{{ $filter['accountManagerName'] ?? null }}"
                                                    wire:model.defer="filter.accountManager_id"
                                                    data-placeholder="Select an option" name="accountManagerName">
                                                    <option>Select Account Manager</option>

                                                    @foreach ($orders as $orders_Data)
                                                        <option value="{{ $orders_Data->accountManager_id }}">
                                                            {{ $orders_Data->manager->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <div class="menu-content px-3 py-3">
                                                    <button type="submit" class="btn btn-light-primary btn-sm px-4"
                                                        href="#">
                                                        Filter
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end::Menu item-->
                                        </form>
                                    </div>
                                </div>
                                <!--end::Filter-->

                                <div>
                                    <!--begin::Order Add -->
                                    <button class="btn btn-icon btn-light-primary rotate me-2"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-top">
                                        <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                            add_shopping_cart
                                        </span>
                                    </button>
                                    <!--end::Order Add -->
                                </div>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Datatable-->
                        <table id="kt_datatable_example_1" class="table align-middle table-row-dashed">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="" style="width: 29.9px;">
                                        <div class="form-check form-check-sm form-check-custom  me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                wire:model="selectPage"
                                                data-kt-check-target="#kt_ecommerce_subscription_table .form-check-input">
                                        </div>

                                    </th>

                                    <th class="min-w-100px sorting" tabindex="0" wire:click="sortBy('date')"
                                        aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                        aria-label="Order ID: activate to sort column ascending"
                                        style="width: 132.55px;">
                                        Date

                                        @if ($sortBy === 'date')
                                            @if ($orderBy === 'DESC')
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    keyboard_arrow_down
                                                </span>
                                            @else
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    expand_less
                                                </span>
                                            @endif
                                        @endif
                                    </th>
                                    <th class="min-w-100px sorting" tabindex="0" wire:click="sortBy('remarks')"
                                        aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                        aria-label="Order ID: activate to sort column ascending"
                                        style="width: 132.55px;">
                                        Remarks
                                        @if ($sortBy === 'remarks')
                                            @if ($orderBy === 'DESC')
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    keyboard_arrow_down
                                                </span>
                                            @else
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    expand_less
                                                </span>
                                            @endif
                                        @endif
                                    </th>
                                    <th class="min-w-75px sorting" tabindex="0" wire:click="sortBy('lead_id')"
                                        aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                        style="width: 75.862px;">
                                        Lead
                                        @if ($sortBy === 'lead_id')
                                            @if ($orderBy === 'DESC')
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    keyboard_arrow_down
                                                </span>
                                            @else
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    expand_less
                                                </span>
                                            @endif
                                        @endif
                                    </th>
                                    <th class="text-end min-w-70px sorting" tabindex="0"
                                        wire:click="sortBy('accountManager_id')"
                                        aria-controls="kt_ecommerce_sales_table" rowspan="1" colspan="1"
                                        style="width: 70px;">
                                        Account Manager

                                        @if ($sortBy === 'accountManager_id')
                                            @if ($orderBy === 'DESC')
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    keyboard_arrow_down
                                                </span>
                                            @else
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    expand_less
                                                </span>
                                            @endif
                                        @endif
                                    </th>
                                    <th class="text-end min-w-100px sorting" tabindex="0"
                                        wire:click="sortBy('invoice_id')" aria-controls="kt_ecommerce_sales_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Total: activate to sort column ascending"
                                        style="width: 132.55px;">
                                        Invoice
                                        @if ($sortBy === 'invoice_id')
                                            @if ($orderBy === 'DESC')
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    keyboard_arrow_down
                                                </span>
                                            @else
                                                <span class="material-icons-outlined" data-bs-toggle="tooltip">
                                                    expand_less
                                                </span>
                                            @endif
                                        @endif
                                    </th>



                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 135.025px;">Actions</th>

                                    <th class="text-end min-w-30px sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions" style="width: 35.025px;">Items</th>
                                </tr>
                            </thead>

                            <!--begin::tbody-->
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($this->order as $ordersData)
                                    <tr class="odd">

                                        <!-- begin Checkbox multidelete -->
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom ">
                                                <input class="form-check-input " type="checkbox"
                                                    wire:model="selected" value="{{ $ordersData->id }}">
                                            </div>

                                        </td>
                                        <!-- end Checkbox multidelete -->

                                        <!-- begin Checkbox orderid -->
                                        <td data-kt-ecommerce-order-filter="order_id">
                                            <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                class="text-gray-600 text-hover-primary fw-bold">

                                                {{ date(env('DATEFORMATE') . ' H:i:s', strtotime($ordersData->date)) }}</a>
                                        </td>
                                        <!-- begin Checkbox orderid -->

                                        <!-- begin remarks -->
                                        <td data-order="Completed">
                                            <!--begin::Badges-->

                                            <span class="fw-bold"> {{ $ordersData->remarks ?? 'NULL' }}</span>

                                            <!--end::Badges-->
                                        </td>
                                        <!-- end remarks -->
                                        <!-- begin Customer -->
                                        <td>
                                            <span class="fw-bold">{{ $ordersData->lead->name ?? 'NULL' }}</span>
                                        </td>
                                        <!-- end Customer -->


                                        <!-- begin status -->
                                        <td class="text-end pe-0" data-order="Completed">
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">
                                                {{ $ordersData->manager->name ?? 'NULL' }}
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                        <!-- end status -->

                                        <!-- begin total -->
                                        <td class="text-end pe-0">
                                            <span class="fw-bold">{{ $ordersData->invoice->id ?? 'NULL' }}</span>
                                        </td>
                                        <!-- end total -->

                                        <td class="text-end">
                                            <a href="#"
                                                class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                Actions
                                                <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                        class="menu-link px-3">
                                                        View
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/edit-order.html"
                                                        class="menu-link px-3">
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
                                        <td>
                                            <button class="accordion-button fs-6 fw-semibold" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#order_{{ $ordersData->id }}_items"
                                                wire:click="getOrderItem({{ $ordersData->id }})"
                                                aria-controls="order_{{ $ordersData->id }}_items"
                                                aria-expanded="true">
                                                Show Order Items
                                            </button>
                                           

                                        </td>
                                    </tr>

                                    <tr wire:ignore.self>
                                        <td colspan="8">
                                            <div id="order_{{ $ordersData->id }}_items"
                                                class="accordion-collapse collapse"
                                                aria-labelledby="order_{{ $ordersData->id }}_items"
                                                data-bs-parent="#kt_accordion_1">

                                                <div class="accordion-body">
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table table-row-dashed ">
                                                            <!--begin::Table head-->

                                                            <!--begin::Table body-->
                                                            <tbody class="fw-semibold text-gray-800">

                                                                @if ($orderItemData)
                                                                    @foreach ($orderItemData as $order_item_Data)
                                                                        <!--begin::row-->
                                                                        <tr>
                                                                            <td style="width: 70px;">
                                                                                <div
                                                                                    class="d-flex align-items-center gap-3">
                                                                                    <a href="#"
                                                                                        class="symbol symbol-50px bg-secondary bg-opacity-25 rounded">
                                                                                        <img src="{{ asset('assets\images\logo\favicon1.png') }}"
                                                                                            alt=""
                                                                                            data-kt-docs-datatable-subtable="template_image" />
                                                                                    </a>
                                                                                    <div
                                                                                        class="d-flex flex-column text-muted">
                                                                                        <a href="#"
                                                                                            class="text-dark text-hover-primary fw-bold"
                                                                                            data-kt-docs-datatable-subtable="template_name">Product
                                                                                            name</a>
                                                                                        <div class="fs-7"
                                                                                            data-kt-docs-datatable-subtable="template_description">
                                                                                            {{ $order_item_Data->productName->name ?? null }}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>

                                                                            <td class="text-end">
                                                                                <div class="text-dark fs-7">Qty</div>
                                                                                <div class="text-muted fs-7 fw-bold"
                                                                                    data-kt-docs-datatable-subtable="template_qty">
                                                                                    {{ $order_item_Data->quantity ?? null }}
                                                                                </div>
                                                                            </td>

                                                                            <td class="text-end">
                                                                                <div class="text-dark fs-7 me-3">Period
                                                                                </div>
                                                                                <div class="text-muted fs-7 fw-bold"
                                                                                    data-kt-docs-datatable-subtable="template_stock">
                                                                                    {{ $order_item_Data->period ?? null }}
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-end">
                                                                                <a href="#"
                                                                                    class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary"
                                                                                    data-kt-menu-trigger="click"
                                                                                    data-kt-menu-placement="bottom-end">
                                                                                    Actions
                                                                                    <i
                                                                                        class="ki-duotone ki-down fs-5 ms-1"></i>
                                                                                </a>
                                                                                <!--begin::Menu-->
                                                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                                                    data-kt-menu="true">
                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/details.html"
                                                                                            class="menu-link px-3">
                                                                                            View
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->

                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="/metronic8/demo1/../demo1/apps/ecommerce/sales/edit-order.html"
                                                                                            class="menu-link px-3">
                                                                                            Edit
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->

                                                                                    <!--begin::Menu item-->
                                                                                    <div class="menu-item px-3">
                                                                                        <a href="#"
                                                                                            class="menu-link px-3"
                                                                                            data-kt-ecommerce-order-filter="delete_row">
                                                                                            Delete
                                                                                        </a>
                                                                                    </div>
                                                                                    <!--end::Menu item-->
                                                                                </div>
                                                                                <!--end::Menu-->
                                                                            </td>
                                                                        </tr>
                                                                        <!--end::end row-->
                                                                    @endforeach
                                                                @endif
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::tbody-->
                        </table>
                        <!--end::Datatable-->
                        {{ $this->order->links('pagination::bootstrap-5') }}
                    </div>

                    <div class="tab-pane fade  active btn-primary" id="kt_tab_pane_8" role="tabpanel">

                        <div class="d-flex flex-stack mb-5">
                            @section('css')
                                <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
                            @endsection
                            <div>
                                <!--begin::Form-->
                                <form wire:submit.prevent="orderAddSubmit" id="kt_docs_formvalidation_text"
                                    class="form" action="#" autocomplete="off">
                                    <div class="row">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 col-6">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Lead</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder="Enter Lead"
                                                value="{{ $details['lead']['name'] }},{{ $details['lead']['id'] }}"
                                                readonly />
                                            <!--end::Input-->
                                        </div>
                                        <div class="fv-row mb-10 col-6">
                                            <!--begin::Label-->
                                            <label class="required fw-semibold fs-6 mb-2">Remarks</label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input wire:model.defer="remarks" type="textarea" name="remark"
                                                class="form-control form-control-solid mb-3 mb-lg-0"
                                                placeholder=" Enter Remarks" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--begin::Repeater-->
                                    <div id="kt_docs_repeater_advanced">
                                        <!--begin::Form group-->
                                        @foreach ($order_item as $index => $order_items)
                                            <div class="form-group">
                                                <div data-repeater-list="kt_docs_repeater_advanced">
                                                    <div data-repeater-item>
                                                        <div class="form-group row mb-5">
                                                            <div class="col-md-4  col-lg-3">
                                                                <label class="form-label">Select Product:</label>
                                                                <select class="form-select"
                                                                    wire:model.defer="order_items.{{ $index }}.product_id"
                                                                    name="productItem" aria-label="Select example">
                                                                    <option> Product</option>
                                                                    @foreach ($details['product'] as $item)
                                                                        <option value="{{ $item['id'] }}">
                                                                            {{ $item['name'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3 col-lg-3">
                                                                <label class="form-label">Select Period:</label>
                                                                <select class="form-select" name="period"
                                                                    wire:model.defer="order_items.{{ $index }}.period"
                                                                    data-placeholder="Select an period">
                                                                    <option>Select Period</option>
                                                                    <option value="1h">1 hr</option>
                                                                    <option value="2h">2 hr</option>
                                                                    <option value="3h">3 hr</option>
                                                                    <option value="1d">1 Day</option>
                                                                    <option value="3d">3 Days</option>
                                                                    <option value="7d">7 Days</option>
                                                                    <option value="15d">15 Days</option>
                                                                    <option value="1m">1 Month</option>
                                                                    <option value="3m">3 Month</option>
                                                                    <option value="6m">6 Month</option>
                                                                    <option value="9m">9 Month</option>
                                                                    <option value="1y">1 Year</option>
                                                                </select>
                                                            </div>

                                                            <div class="col-md-3 col-lg-3">
                                                                <label class="form-label">Quantity</label>
                                                                <input
                                                                    wire:model.defer="order_items.{{ $index }}.quantity"
                                                                    name="quantity" class="form-control"
                                                                    type="number" value=""
                                                                    placeholder="quantity" />
                                                            </div>
                                                            <div class="col-md-3 col-lg-2">
                                                                <label class="form-label"> </label>
                                                                <a href="javascript:;"
                                                                    wire:click.defer="addOrderItemRepeater()"
                                                                    class="btn btn-light-primary mt-3 mt-md-9">
                                                                    Add
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Form group-->
                                        @endforeach
                                        <!--end::Repeater-->
                                        <div class="row text-end mb-7">
                                            <div class="col">
                                                <button class="btn btn-primary" wire:click="orderAddSubmit">Save
                                                    Order</button>
                                            </div>
                                        </div>
                                </form>
                                <!--end::Form-->
                            </div>

                        </div>
                        @section('scripts')
                            <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
                            <script>
                                $('#kt_docs_repeater_advanced').repeater({
                                    initEmpty: false,

                                    defaultValues: {
                                        'text-input': 'foo'
                                    },

                                    show: function() {
                                        $(this).slideDown();

                                        // Re-init select2
                                        $(this).find('[data-kt-repeater="select2"]').select2();

                                        // Re-init flatpickr
                                        $(this).find('[data-kt-repeater="datepicke"]').flatpickr();

                                        // Re-init tagify
                                        new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
                                    },

                                    hide: function(deleteElement) {
                                        $(this).slideUp(deleteElement);
                                    },

                                    ready: function() {
                                        // Init select2
                                        $('[data-kt-repeater="select2"]').select2();

                                        // Init flatpickr
                                        $('[data-kt-repeater="datepicke"]').flatpickr();

                                        // Init Tagify
                                        new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
                                    }
                                });
                            </script>
                        @endsection
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

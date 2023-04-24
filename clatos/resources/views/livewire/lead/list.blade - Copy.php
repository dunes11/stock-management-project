@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Leads &nbsp;</li>
    <!--end::Item-->
@endsection
@section('title', '| Leads')
@section('toolbox')
    <div class="d-flex pe-10">
        <!--begin::Menu-->
        <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold w-125px me-3" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                <!--begin::Menu link-->
                <a href="#" class="menu-link bg-primary w-50px">
                    <span class="menu-icon">
                        <span class="material-icons-round text-white">
                            filter_list
                        </span>
                    </span>

                </a>
                <!--end::Menu link-->

                <!--begin::Menu sub-->
                <div class="menu-sub menu-sub-dropdown p-3 w-200px">


                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="#" class="menu-link px-1 py-3" wire:click="customSort('name')">
                            <span class="menu-bullet me-0">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Name</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="#" class="menu-link px-1 py-3" wire:click="customSort('id')">
                            <span class="menu-bullet me-0">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">ID</span>
                        </a>
                    </div>
                    <!--end::Menu item-->
                    <!--begin::Menu item-->
                    <div class="menu-item">
                        <a href="#" class="menu-link px-1 py-3" wire:click="customSort('assignedTo_id')">
                            <span class="menu-bullet me-0">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">A/C Manager</span>
                        </a>
                    </div>
                    <!--end::Menu item-->

                </div>
            </div>
        </div>
        <div>
            <!--begin::Toggle-->
            <!--begin::Svg Icon |fiter-->
            <button type="button" class="btn btn-sm btn-primary  " data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end" data-kt-menu-offset="0,5">
                <span class="material-icons-round">
                    filter_alt
                </span>

                <!--end::Svg Icon-->
            </button>
            <!--end::Toggle-->

            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-300px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Name & ID
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Date</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Advance</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" wire:click="resetFilter"><i class="bi bi-arrow-clockwise fs-2"></i></a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <form wire:submit.prevent="searchByNameID">
                                    <!--begin::Input group-->
                                    <div class="form-floating mb-7">
                                        <input type="text" class="form-control form-control-solid"
                                            wire:model.defer="name" id="name" name="name_id"
                                            placeholder="Name OR ID" />
                                        <label for="name">Name OR ID</label>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit"> Search</button>
                                    </div>

                                </form>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="card">

                                    <div class="card-body p-2">
                                        <form wire:submit.prevent="searchByDate">

                                            <div class="col">
                                                <div
                                                    class="fv-row mb-9 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">

                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid flatpickr-input"
                                                        wire:model.defer="date" name="between" placeholder="Pick Dates"
                                                        id="kt_datepicker_1" value="{{ $date }}" type="text"
                                                        readonly="readonly">
                                                    <!--end::Input-->
                                                    <div class="fv-plugins-message-container invalid-feedback">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col text-end">
                                                <button class="btn btn-primary">
                                                    Apply
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                <form wire:submit.prevent="advanceFilter">
                                    <div>
                                        <div
                                            class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                            <label class="form-check-label fs-4 fw-semibold text-dark" for="selVip">
                                                Vip
                                            </label>
                                            <input class="form-check-input" type="checkbox" id="selVip"
                                                value="isVip" wire:model.lazy="advFilter" name="advFilter" />
                                        </div>
                                        <div
                                            class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                            <label class="form-check-label fs-4 fw-semibold text-dark" for="selBookmark">
                                                Bookmark
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="isBookmark"
                                                id="selBookmark" wire:model.lazy="advFilter" name="advFilter" />
                                        </div>
                                        <div
                                            class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                            <label class="form-check-label fs-4 fw-semibold text-dark" for="selJunk">
                                                Junk
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="isJunk"
                                                id="selJunk" wire:model.lazy="advFilter" name="advFilter" />
                                        </div>
                                        <div
                                            class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                            <label class="form-check-label fs-4 fw-semibold text-dark" for="selDnd">
                                                DND
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="isDnd"
                                                id="selDnd" wire:model.lazy="advFilter" name="advFilter" />
                                        </div>
                                        <div
                                            class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                            <label class="form-check-label fs-4 fw-semibold text-dark" for="selBlock">
                                                Blocked
                                            </label>
                                            <input class="form-check-input" type="checkbox" value="isBlocked"
                                                id="selBlock" wire:model.lazy="advFilter" name="advFilter" />
                                        </div>
                                    </div>
                                    <div class="text-end pt-3">
                                        <button class="btn btn-primary" type="submit">submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
        </div>
        <div>
            <a href="{{ route('lead.add') }}" class="btn btn-success ms-10">Add lead</a>
        </div>
    </div>
@endsection

<div class="">

    <div class="row overflow-auto  g-5 gy-10">
        @forelse ($leads as $item)
            <div class=" col-lg-3 col-md-6 col-sm-11 mb-4 ">
                <div class="card h-100  shadow-sm ribbon ribbon-end  p-4 pb-0 position-relative ">
                    @if ($item->isBookmark)
                        <div class="ribbon-label bg-warning p-3 ">
                            <i class="bi bi-star-fill text-white"></i>
                        </div>
                    @endif
                    <!--begin::Ribbon-->
                    <!--end::Ribbon-->
                    <div class="card-body p-0">
                        <div
                            class="ribbon ribbon-triangle ribbon-top-start border-primary rounded-3 rounded-end-0 rounded-bottom-0">
                            <!--begin::Ribbon icon-->
                            <div class="ribbon-icon m-n6 ">
                                <a href="{{ route('lead.edit', ['id' => $item->id]) }}" data-bs-toggle="tooltip"
                                    data-bs-toggle="tooltip" data-bs-delay-hide="1000" data-bs-placement="top"
                                    title="Edit">
                                    <i class="bi bi-pencil fs-2 text-white"></i>
                                </a>
                            </div>
                            <!--end::Ribbon icon-->
                        </div>
                        <!--begin::Details-->

                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <!--begin: Pic-->

                            <!--end::Pic-->

                            <!--begin::Info-->
                            <div class="flex-grow-1 row">
                                <!--begin::Title-->
                                <div class=" card">
                                    <div class="card-header ">
                                        <!--begin::Menu wrapper-->
                                        <div class="card-title">


                                            @if ($item->isVip)
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-inverse" data-bs-placement="top"
                                                    title="VIP">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary pe-2 ">
                                                        <span class="material-icons pt-2">
                                                            verified
                                                        </span></span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            @endif


                                            <a data-kt-menu-trigger="hover" data-kt-menu-placement="top" data-kt-m
                                                enu-offset="30px, 30px"
                                                class="text-gray-900 text-hover-primary fs-4 fw-bold me-1 text-break ">{{ $item->name }}
                                                ({{ $item->id }})
                                            </a>

                                            <!--end::name-->

                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-350px"
                                                data-kt-menu="true">
                                                <div class="card m-3 p-2">
                                                    <table class="">
                                                        <tbody>
                                                            <tr>
                                                                <th>Gen Date</th>
                                                                <td>{{ $item->date ? date('d M,Y', strtotime($item->date)) : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Next FollowUp</th>
                                                                <td>{{ $item->nextFollowup ? date('d M,Y  h:i A ', strtotime('06/10/2011 19:00:02')) : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>GSTIN</th>
                                                                <td>{{ $item->gst ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Query For</th>
                                                                <td>{{ $item->lead_for_id ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Lead Source</th>
                                                                <td>{{ $item->lead_source_id ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Remark</th>
                                                                <td>{{ $item->remark ?? '-' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-danger">H/W Change Count</th>
                                                                <td>{{ $item->id ?? '-' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--end::Menu-->
                                            <!--end::Dropdown wrapper-->
                                            <!--end::AccountManager-->
                                        </div>
                                        <div class="card-toolbar">

                                            @if ($item->isCustomer)
                                                <span class="badge badge-success ">Customer</span>
                                            @else
                                                <span class="badge badge-light-success ">Lead</span>
                                            @endif

                                            <!--begin::AccountManager-->
                                            <div class="me-5 badge badge-light-info">
                                                {{ $item->accManager->name ?? 'Unassigned' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body py-2">
                                        <div class="table-responsive h-75px w-lg-275px">
                                            <table class="table fs-6 table-flush">
                                                <tr>
                                                    <th class="w-20px">
                                                        <span class="material-icons opacity-50">
                                                            business
                                                        </span>
                                                    </th>
                                                    <td>
                                                        {{ $item->company ?? '-' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th class="w-20px">
                                                        <span class="material-icons opacity-50">
                                                            place
                                                        </span>
                                                    </th>
                                                    <td>
                                                        {{ $item->city ? $item->city . ', ' : '' }}{{ $item->state ? $item->state . ', ' : '' }}{{ $item->country ? $item->country . ', ' : '' }}{{ $item->pincode ? '(' . $item->pincode . ')' : '' }}
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                    </div>
                                    <div class="card-footer py-3">
                                        <div class="row">

                                            <div class="col">


                                                <!--start::Timeline Link-->
                                                <a href="{{ route('lead.profile', ['lead' => $item->id]) }}"
                                                    class="btn btn-sm btn-icon bg-hover-secondary text-hover-primary ">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <i class="ki-duotone ki-eye fs-2x">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                    </i>
                                                    <!--end::Svg Icon-->
                                                </a>
                                                <!--end::Timeline Link-->
                                                <!--begin::Menu-->
                                                <div
                                                    class="btn btn-icon  bg-hover-secondary text-hover-primary btn-sm  position-relative">
                                                    <!--begin::Svg Icon | cart-->
                                                    <i class="ki-duotone ki-basket fs-2x">
                                                        <i class="path1"></i>
                                                        <i class="path2"></i>
                                                        <i class="path3"></i>
                                                        <i class="path4"></i>
                                                    </i>
                                                    <!--end::Svg Icon-->
                                                    <!--begin::badge-->
                                                    <span
                                                        class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-primary">{{ $item->carts->count() }}</span>
                                                    <!--end::badge-->
                                                </div>
                                                <div
                                                    class="btn btn-icon  bg-hover-secondary text-hover-primary btn-sm  ">

                                                    <button class="btn btn-icon  btn-active-color-primary "
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                        <i class="ki-duotone ki-setting-4 fs-2x"></i>
                                                    </button>

                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="bookmark">
                                                                    Bookmark
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="bookmark"
                                                                    wire:click="updateleadFlag('isBookmark',{{ $item->id }},{{ $item->isBookmark == 1 ? '0' : '1' }})"
                                                                    {{ $item->isBookmark == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="cold">
                                                                    Cold
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="cold"
                                                                    wire:click="updateleadFlag('isCold',{{ $item->id }},{{ $item->isCold == 1 ? '0' : '1' }})"
                                                                    {{ $item->isCold == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="junk">
                                                                    Junk
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="junk"
                                                                    wire:click="updateleadFlag('isJunk',{{ $item->id }},{{ $item->isJunk == 1 ? '0' : '1' }})"
                                                                    {{ $item->isJunk == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-danger form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="Block">
                                                                    Block
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="Block"
                                                                    wire:click="updateleadFlag('isBlocked',{{ $item->id }},{{ $item->isBlocked == 1 ? '0' : '1' }})"
                                                                    {{ $item->isBlocked == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="dnd">
                                                                    DND
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="dnd"
                                                                    wire:click="updateleadFlag('isDnd',{{ $item->id }},{{ $item->isDnd == 1 ? '0' : '1' }})"
                                                                    {{ $item->isDnd == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="reseller">
                                                                    Reseller
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" value="" id="reseller"
                                                                    wire:click="updateleadFlag('isReseller',{{ $item->id }},{{ $item->isReseller == 1 ? '0' : '1' }})"
                                                                    {{ $item->isReseller == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        <!--Separator:: start-->
                                                        <div class="separator separator-dotted my-5"></div>
                                                        <!--Separator:: end-->
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3 ">
                                                            <div
                                                                class="form-check form-switch form-check-custom form-check-success form-check-solid me-10 d-flex justify-content-between">
                                                                <label
                                                                    class="form-check-label fs-4 fw-semibold text-dark"
                                                                    for="vip">
                                                                    VIP
                                                                </label>
                                                                <input class="form-check-input h-20px w-30px"
                                                                    type="checkbox" id="vip"
                                                                    wire:click="updateleadFlag('isVip',{{ $item->id }},{{ $item->isVip == 1 ? '0' : '1' }})"
                                                                    {{ $item->isVip == 1 ? 'checked' : '' }} />
                                                            </div>
                                                        </div>
                                                        <!--end::Menu item-->


                                                    </div>
                                                    <!--end::Menu-->

                                                    <!--end::Menu-->
                                                </div>
                                                <!--begin::Menu wrapper-->
                                            </div>
                                            <div class="col text-end">
                                                <!--begin::Toggle-->
                                                <button type="button" class="btn btn-sm p-1 btn-primary"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                                                    data-kt-menu-offset="30px, 30px">
                                                    Actions

                                                </button>
                                                <!--end::Toggle-->

                                                <!--begin::Menu-->
                                                <div class="text-start menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold h-350px overflow-auto w-250px"
                                                    data-kt-menu="true">

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Order
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Bill Address
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Transactions
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Invoice
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Docs
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Domain
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Gr. Project
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Gr. Brands
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            Quotation
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            License
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu separator-->
                                                    <div class="separator mb-3 opacity-75"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3  fs-6 text-dark fw-bold px-3 py-4">
                                                        <a class=" menu-content fs-6 text-dark fw-bold px-3 py-4"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-start">
                                                            FeedBack by lead
                                                        </a>

                                                        <!--begin::Menu 3-->
                                                        <div class=" menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3"
                                                            data-kt-menu="true">

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3 ">
                                                                <a href="#" class="menu-link px-3">
                                                                    Create
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                            <!--begin::Menu item-->
                                                            <div class="menu-item px-3">
                                                                <a href="#" class="menu-link px-3">
                                                                    List
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->

                                                        </div>
                                                        <!--end::Menu 3-->
                                                    </div>
                                                    <!--end::Menu item-->

                                                </div>
                                                <!--end::Menu-->


                                            </div>
                                            <!--end::Dropdown wrapper-->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Details-->
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="row">
                <div
                    class="col alert alert-danger opacity-25 opacity-75-hover fs-2qx text-center text-dark text-hover-danger">
                    No leads Yet
                </div>
            </div>
        @endforelse
    </div>
</div>

@section('scripts')
    <script>
        // $("#kt_datepicker_1").flatpickr();
        $("#kt_datepicker_1").flatpickr({
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            mode: "range"
        });
    </script>
@endsection
@section('css')
    <style>
        body {
            scroll-margin-block: 100px;
        }
    </style>
@endsection

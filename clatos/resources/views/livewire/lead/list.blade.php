@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Leads &nbsp;</li>
    <!--end::Item-->
@endsection
@section('title', '| Leads')
@section('toolbox')

@endsection

<div class=" card rounded rounded-4  mb-5 mb-xl-8">
    <div class="card-header">
        <div class="card-title"></div>
        <div class="card-toolbar">
            <div class="d-flex gap-3" wire:ignore>

                <!--begin::Menu-->
                <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold " data-kt-menu="true"
                    wire:ignore>
                    <!--begin::Menu item-->
                    <div class="menu-item" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start">
                        <!--begin::Menu link-->
                        <a href="#" class="menu-link btn btn-icon btn-light-primary ">
                            <span class="menu-icon text-hover-white text-primary">
                                <i class="ki-duotone ki-arrow-up-down fs-1">
                                    <i class="path1 text-primary text-hover-white"></i>
                                    <i class="path2 text-primary text-hover-white"></i>
                                </i>
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
                    <button type="button" class="btn btn-icon btn-light-primary  " data-kt-menu-trigger="click"
                        wire:ignore data-kt-menu-placement="bottom-end" data-kt-menu-offset="0,5">
                        <span class="material-icons-round">
                            filter_alt
                        </span>

                        <!--end::Svg Icon-->
                    </button>
                    <!--end::Toggle-->

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-300px"
                        wire:ignore data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Name
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Date</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Advance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="resetFilter"><i
                                                class="bi bi-arrow-clockwise fs-2"></i></a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent" wire:ignore>
                                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                        {{-- <form wire:submit="searchByNameID"> --}}
                                        <!--begin::Input group-->
                                        <div class="form-floating mb-5">
                                            <input type="text" class="form-control form-control-solid"
                                                wire:model="name" id="name" name="name_id" placeholder="Name" />
                                            <label for="name">Name</label>
                                        </div>
                                        <!--end::Input group-->
                                        {{-- <div class="text-end">
                                                <button class="btn btn-primary" type="submit"> Search</button>
                                            </div> 
                                        </form>
                                            --}}

                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                        <div class="card" wire:ignore>

                                            <div class="card-body p-2">
                                                <form wire:submit.prevent="searchByDate">

                                                    <div class="col">
                                                        <div class="mb-9 ">

                                                            <!--begin::Input-->
                                                            <input
                                                                class="form-control form-control-solid flatpickr-input"
                                                                wire:model.prevent="date" name="between"
                                                                placeholder="Pick Dates" id="kt_datepicker_1"
                                                                value="{{ $date }}" type="text"
                                                                readonly="readonly" wire:ignore>
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
                                                    <label class="form-check-label fs-4 fw-semibold text-dark"
                                                        for="selVip">
                                                        Vip
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="selVip"
                                                        wire:model="advFilter.isVip" name="advFilter" />
                                                </div>
                                                <div
                                                    class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                                    <label class="form-check-label fs-4 fw-semibold text-dark"
                                                        for="selBookmark">
                                                        Bookmark
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="selBookmark"
                                                        wire:model="advFilter.isBookmark" name="advFilter" />
                                                </div>
                                                <div
                                                    class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                                    <label class="form-check-label fs-4 fw-semibold text-dark"
                                                        for="selJunk">
                                                        Junk
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="selJunk"
                                                        wire:model="advFilter.isJunk" name="advFilter" />
                                                </div>
                                                <div
                                                    class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                                    <label class="form-check-label fs-4 fw-semibold text-dark"
                                                        for="selDnd">
                                                        DND
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="selDnd"
                                                        wire:model="advFilter.isDnd" name="advFilter" />
                                                </div>
                                                <div
                                                    class="form-check d-flex justify-content-between form-check-custom form-check-solid  mt-3">
                                                    <label class="form-check-label fs-4 fw-semibold text-dark"
                                                        for="selBlock">
                                                        Blocked
                                                    </label>
                                                    <input class="form-check-input" type="checkbox" id="selBlock"
                                                        wire:model="advFilter.isBlock" name="advFilter" />
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
                    <a href="{{ route('lead.add') }}" class="btn btn-icon btn-light-success "
                        data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-delay-hide="1000"
                        data-bs-placement="top" title="Add Lead"><span class="material-icons-round">
                            person_add
                        </span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        @include('layouts.components.alerts')
        <!--begin::Body-->
        <div class=" p-2">
            <!--begin::Table container-->
            <div class="table-responsive ">
                <!--begin::Table-->
                <table class="table align-middle gs-0 gy-3 table-row-bordered table-hover" id="leadsTable">
                    <!--begin::Table head-->
                    <thead class="bg-gray-800 text-gray-200 text-center">
                        <tr>
                            <th class="p-2 min-w-150px text-capitalize ">name</th>
                            <th class="p-2 min-w-150px text-capitalize">contact</th>
                            <th class="p-2 min-w-150px text-capitalize">Company info</th>
                            <th class="p-2 min-w-150px text-capitalize">Manager</th>
                            <th class="p-2 min-w-150px text-capitalize">Lead For</th>
                            <th class="p-2 min-w-150px text-capitalize">Created Date</th>
                            <th class="p-2 min-w-150px text-capitalize">Tags</th>
                            <th class="p-2 min-w-150px text-capitalize">Address</th>
                            <th class="p-2 min-w-150px text-capitalize">Status</th>
                            <th class="p-2 min-w-150px text-capitalize">Action</th>
                        </tr>
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="text-center scrolly align-middle">

                        @forelse ($leads as $item)
                            <tr class=" ">
                                <td>
                                    <div class="d-flex gap-3">
                                        <span class=" bullet bullet-vertical h-50px w-5px "
                                            style="background: {!! $item->currentStatus->colorCode !!}"></span>
                                        <span class="text-start">

                                            <a href="{{ route('lead.profile', ['lead' => $item->id]) }}"
                                                class="text-dark fw-bold text-hover-primary fs-6 d-block">{{ $item->name }}</a>

                                            <span class="badge badge-light-success ">
                                                {!! $item->isCustomer == 1 ? 'Customer' : 'Lead' !!}
                                            </span>
                                        </span>
                                        {!! $item->isVip == 1
                                            ? '<span class="material-icons-round m-auto text-info" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="VIP">verified</span>'
                                            : '' !!}

                                    </div>

                                </td>
                                <td class="">
                                    <a href="#"
                                        class="text-dark fw-bold text-hover-primary fs-6 d-block">{!! $item->mobile !!}</a>
                                    <span class="text-muted fw-semibold d-block fs-7">{!! $item->email !!}</span>
                                </td>
                                <td class="">
                                    <span class="fw-semibold fs-5 d-block"> {{ $item->company ?? '-' }}</span>
                                    <a href=""
                                        class="fw-semibold text-gray-700 text-hover-primary">{{ $item->website ?? '-' }}</a>
                                </td>
                                <!-- manager :: begin -->
                                <td class="">

                                    <div class="text-center btn btn-icon">
                                        <!--begin::Menu-->
                                        <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item" data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom">
                                                <!--begin::Menu link-->
                                                <a href="#" class="menu-link py-3">
                                                    <span class="menu-icon text-dark">
                                                        <span class="material-icons-round d-block">
                                                            account_circle
                                                        </span>
                                                    </span>
                                                </a>
                                                <span
                                                    class="fs-4 fw-semibold">{{ $item->accManager->name ?? '' }}</span>
                                                <!--end::Menu link-->
                                                @if ($item->accManager)
                                                    <div class="menu-sub menu-sub-dropdown p-3 w-200px">

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item">
                                                            <table class="table table-flush table-borderless">
                                                                <tbody>
                                                                    <tr>

                                                                        <th>Name</th>
                                                                        <td>
                                                                            {{ $item->accManager->name ?? '' }}
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!--end::Menu item-->

                                                    </div>
                                                @else
                                                    <!--begin::Menu sub-->
                                                    <div class="menu-sub menu-sub-dropdown p-3 w-200px">
                                                        @foreach ($users as $user)
                                                            <!--begin::Menu item-->
                                                            <div class="menu-item">
                                                                <a href="#" class="menu-link px-1 py-3"
                                                                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                                    wire:click="changeManager({{ $item->id }},{{ $user->id }})">
                                                                    <span class="menu-bullet me-0">
                                                                        <span class="bullet bullet-dot"></span>
                                                                    </span>
                                                                    <span
                                                                        class="menu-title">{{ $user->name ?? '' }}</span>
                                                                </a>
                                                            </div>
                                                            <!--end::Menu item-->
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </td>
                                <!-- manager :: end -->
                                <!-- lead for :: begin -->
                                <td>
                                    @foreach ($item->leadFor() as $prds)
                                        {{-- {{ $prds->name}} --}}
                                        <span class="fw-semibold">
                                            {{ $prds->name }}
                                        </span>

                                        {!! $loop->last ? '' : ' | </br>' !!}
                                    @endforeach
                                </td>
                                <!-- lead for :: end -->
                                <td class="">
                                    {{ date(env('DATEFORMATE'), strtotime($item->date)) }}
                                </td>
                                <td class="">
                                    @if ($item->isBookmark == 1)
                                        {!! '<span class="badge badge-secondary">#Bookmark</span>' !!}
                                    @endif

                                    @if ($item->isReseller == 1)
                                        {!! '<span class="badge badge-secondary">#Reseller</span>' !!}
                                    @endif

                                    @if ($item->isCold == 1)
                                        {!! '<span class="badge badge-secondary">#Cold</span>' !!}
                                    @endif
                                    @if ($item->isJunk == 1)
                                        {!! '<span class="badge badge-secondary">#Junk</span>' !!}
                                    @endif
                                    @if ($item->isBlocked == 1)
                                        {!! '<span class="badge badge-secondary">#Blocked</span>' !!}
                                    @endif
                                    @if ($item->isDnd == 1)
                                        {!! '<span class="badge badge-secondary">#Dnd</span>' !!}
                                    @endif
                                </td>
                                <td class="">
                                    <span class="fs-5 fw-normal">

                                        {{ $item->city ? $item->city . ', ' : '' }}{{ $item->state ? $item->state . ', ' : '' }}{{ $item->country ? $item->country . ', ' : '' }}{{ $item->pincode ? '(' . $item->pincode . ')' : '' }}
                                    </span>
                                </td>
                                <td>
                                    <select class="form-select  text-white " wire:model="leadStatus"
                                        style="background: {!! $item->currentStatus->colorCode !!};">
                                        <option>{{ $item->currentStatus->name ?? 'Select' }}</option>
                                        @foreach ($lead_status as $status)
                                            <option value="{{ $status->id . '-' . $item->id }}"
                                                @selected($item->lead_status_id == $status->id)
                                                style="background-color: {{ $status->colorCode }}; ">
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </td>
                                <td>
                                    <div class="">

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
                                        <div class="btn btn-icon  bg-hover-secondary text-hover-primary btn-sm  ">

                                            <button class="btn btn-icon  btn-active-color-primary "
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <i class="ki-duotone ki-setting-4 fs-2x"></i>
                                            </button>

                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px py-4"
                                                data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 ">
                                                    <div
                                                        class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="bookmark">
                                                            Bookmark
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="bookmark"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="cold">
                                                            Cold
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="cold"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="junk">
                                                            Junk
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="junk"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="Block">
                                                            Block
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="Block"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="dnd">
                                                            DND
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="dnd"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="reseller">
                                                            Reseller
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            value="" id="reseller"
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
                                                        <label class="form-check-label fs-4 fw-semibold text-dark"
                                                            for="vip">
                                                            VIP
                                                        </label>
                                                        <input class="form-check-input h-20px w-30px" type="checkbox"
                                                            id="vip"
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
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <h1 class="text-danger">No Records Found ?.</h1>
                                </td>
                            </tr>
                        @endforelse
                
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <!--end::Tap pane-->

        </div>
        <!--end::Body-->
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

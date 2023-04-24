@extends('livewire.lead.show')
@section('profile-tabs')
    <div class="tab-pane fade show active" id="main_tab1" role="tabpanel">
        <div class="card">
            {{-- <div class="">
                <div class="card-title">
                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                        <li class="nav-item">
                            <a class="nav-link d-flex fs-3 active" data-bs-toggle="tab" href="#profile_tab1">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex fs-3" data-bs-toggle="tab" href="#profile_tab2">Billing Address</a>
                        </li>
                        <li class="nav-item"><a class="nav-link d-flex fs-2" data-bs-toggle="tab" href="#profile_tab3">Address</a></li>
                    </ul>

                </div>
            </div> --}}
            <div class="card-body p-2">
                <div id="kt_app_content_container" class="app-container  container-xxl ">

                    <!--begin::Navbar-->
                    <div class="card mb-5 mb-xl-10  m-4 ribbon ribbon-top ribbon-vertical p-4 position-relative">
                        @if ($lead->isBookmark)
                            <div class="ribbon-label bg-warning  ">
                                <i class="bi bi-star-fill fs-2 text-white"></i>
                            </div>
                        @endif
                        <!--begin::Ribbon-->
                        <!--end::Ribbon-->
                        <div class="card-body p-0">
                            <div
                                class="ribbon ribbon-triangle ribbon-top-start border-primary rounded-4 rounded-end-0 rounded-bottom-0">
                                <!--begin::Ribbon icon-->
                                <div class="ribbon-icon m-n6 ">
                                    <a href="{{ route('lead.edit', ['id' => $lead->id]) }}" data-bs-toggle="tooltip"
                                        data-bs-toggle="tooltip" data-bs-delay-hide="1000" data-bs-placement="top"
                                        title="Edit">
                                        <i class="bi bi-pencil fs-2 text-white"></i>
                                    </a>
                                </div>
                                <!--end::Ribbon icon-->
                            </div>
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::User-->
                                    <div class="d-flex flex-column ms-10">
                                        <!--begin::Name-->
                                        <div class="d-flex align-items-center mb-2">
                                            <a href="#"
                                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $lead->name }}
                                                ({{ $lead->id }})</a>
                                            @if ($lead->isVip)
                                                <a href="#" data-bs-toggle="tooltip"
                                                    data-bs-custom-class="tooltip-inverse" data-bs-placement="top"
                                                    title="VIP">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <span class="material-icons">
                                                            verified
                                                        </span></span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            @endif
                                            @if ($lead->isCustomer)
                                                <a href="#"
                                                    class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3">Customer</a>
                                            @else
                                                <a href="#"
                                                    class="btn btn-sm btn-light-primary fw-bold ms-2 fs-8 py-1 px-3">Lead</a>
                                            @endif
                                        </div>
                                        <!--end::Name-->

                                        <!--begin::Info-->
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">






                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <i class="ki-duotone ki-profile-circle fs-4 me-1"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i>
                                                @if ($lead->isCustomer)
                                                    <a href="#"
                                                        class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3">Customer</a>
                                                @else
                                                    <a href="#"
                                                        class="btn btn-sm btn-light-primary fw-bold ms-2 fs-8 py-1 px-3">Lead</a>
                                                @endif
                                            </a>
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                <span class="material-icons-two-tone opacity-50">
                                                    place
                                                </span> SF, Bay Area
                                            </a>
                                            <a href="#"
                                                class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                <span class="material-icons-two-tone opacity-50">
                                                    email
                                                </span> max@kt.com
                                            </a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->

                                    <!--begin::Actions-->
                                    <div class="d-flex my-4">
                                        <div class="">
                                            <!--begin::AccountManager-->

                                            <div class="me-5 badge badge-light-info">
                                                {{ $lead->accManager->name ?? 'Unassigned' }}
                                            </div>
                                            <!--end::AccountManager-->

                                            <!--start::Timeline Link-->
                                            <a href="{{ route('lead.profile', ['lead' => $lead->id]) }}"
                                                class="btn btn-icon bg-hover-secondary text-hover-primary ">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-gray-400">
                                                    <span class="material-icons">
                                                        visibility
                                                    </span>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--end::Timeline Link-->


                                            <!--begin::Menu-->
                                            <div
                                                class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px me-3  position-relative">
                                                <!--begin::Svg Icon | cart-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2hx opacity-50">
                                                    <span class="material-icons-two-tone">
                                                        shopping_cart
                                                    </span>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--begin::badge-->
                                                <span
                                                    class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-primary">{{ $lead->carts->count() }}</span>
                                                <!--end::badge-->
                                            </div>
                                            <div
                                                class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px  me-10 ">

                                                <button class="btn btn-icon  btn-active-color-primary "
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <!--begin::Svg Icon | menu vertical Dots-->
                                                    <span class="svg-icon svg-icon-2tx">
                                                        <span class="material-icons-outlined">
                                                            more_vert
                                                        </span>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>

                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px py-4"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3 ">
                                                        <div
                                                            class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                                            <label class="form-check-label" for="bookmark">
                                                                Bookmark
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="bookmark"
                                                                wire:click="updateleadFlag('isBookmark',{{ $lead->id }},{{ $lead->isBookmark == 1 ? '0' : '1' }})"
                                                                {{ $lead->isBookmark == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="cold">
                                                                Cold
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="cold"
                                                                wire:click="updateleadFlag('isCold',{{ $lead->id }},{{ $lead->isCold == 1 ? '0' : '1' }})"
                                                                {{ $lead->isCold == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="junk">
                                                                Junk
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="junk"
                                                                wire:click="updateleadFlag('isJunk',{{ $lead->id }},{{ $lead->isJunk == 1 ? '0' : '1' }})"
                                                                {{ $lead->isJunk == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="Block">
                                                                Block
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="Block"
                                                                wire:click="updateleadFlag('isBlocked',{{ $lead->id }},{{ $lead->isBlocked == 1 ? '0' : '1' }})"
                                                                {{ $lead->isBlocked == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="dnd">
                                                                DND
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="dnd"
                                                                wire:click="updateleadFlag('isDnd',{{ $lead->id }},{{ $lead->isDnd == 1 ? '0' : '1' }})"
                                                                {{ $lead->isDnd == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="reseller">
                                                                Reseller
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                value="" id="reseller"
                                                                wire:click="updateleadFlag('isReseller',{{ $lead->id }},{{ $lead->isReseller == 1 ? '0' : '1' }})"
                                                                {{ $lead->isReseller == 1 ? 'checked' : '' }} />
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
                                                            <label class="form-check-label" for="vip">
                                                                VIP
                                                            </label>
                                                            <input class="form-check-input h-20px w-30px" type="checkbox"
                                                                id="vip"
                                                                wire:click="updateleadFlag('isVip',{{ $lead->id }},{{ $lead->isVip == 1 ? '0' : '1' }})"
                                                                {{ $lead->isVip == 1 ? 'checked' : '' }} />
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->


                                                </div>
                                                <!--end::Menu-->

                                                <!--end::Menu-->
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->

                                <!--begin::Stats-->
                                <div class="d-flex flex-wrap flex-stack">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-column flex-grow-1 pe-8">
                                        <!--begin::Stats-->
                                        <div class="d-flex flex-wrap">
                                            @if ($lead->balance)
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                            data-kt-countup-value="{{ $lead->balance }}"
                                                            data-kt-countup-prefix="₹" data-kt-initialized="1">
                                                            ₹{{ $lead->balance }}</div>
                                                    </div>
                                                    <!--end::Number-->

                                                    <!--begin::Label-->
                                                    <div class="fw-semibold fs-6 text-gray-400">Balance</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            @endif
                                            @if ($lead->balanceUsd)
                                                <!--begin::Stat-->
                                                <div
                                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                    <!--begin::Number-->
                                                    <div class="d-flex align-items-center">
                                                        <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                        <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                            data-kt-countup-value="{{ $lead->balanceUsd }}"
                                                            data-kt-countup-prefix="$" data-kt-initialized="1">
                                                            ${{ $lead->balanceUsd }}</div>
                                                    </div>
                                                    <!--end::Number-->

                                                    <!--begin::Label-->
                                                    <div class="fw-semibold fs-6 text-gray-400">Balance</div>
                                                    <!--end::Label-->
                                                </div>
                                                <!--end::Stat-->
                                            @endif

                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                        data-kt-countup-value="80" data-kt-initialized="1">80</div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Projects</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->

                                            <!--begin::Stat-->
                                            <div
                                                class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                                <!--begin::Number-->
                                                <div class="d-flex align-items-center">
                                                    <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span
                                                            class="path1"></span><span class="path2"></span></i>
                                                    <div class="fs-2 fw-bold counted" data-kt-countup="true"
                                                        data-kt-countup-value="60" data-kt-countup-prefix="%"
                                                        data-kt-initialized="1">%60</div>
                                                </div>
                                                <!--end::Number-->

                                                <!--begin::Label-->
                                                <div class="fw-semibold fs-6 text-gray-400">Success Rate</div>
                                                <!--end::Label-->
                                            </div>
                                            <!--end::Stat-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Wrapper-->

                                    <!--begin::Progress-->
                                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                            <span class="fw-semibold fs-6 text-gray-400">Profile Compleation</span>
                                            <span class="fw-bold fs-6">50%</span>
                                        </div>

                                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                                            <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <!--end::Progress-->
                                </div>
                                <!--end::Stats-->
                            </div>



                            <!--begin::Navs-->
                            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-2">
                                    <a class="nav-link d-flex fs-3 active" data-bs-toggle="tab"
                                        href="#profile_tab2">Billing
                                        Address</a>
                                </li>
                                <!--end::Nav item-->


                            </ul>
                            <!--begin::Navs-->
                        </div>
                        <div class="tab-content" id="myTabContent1">

                            <div class="tab-pane fade show" id="profile_tab2" role="tabpanel">
                                {{ $lead->addresses }}
                            </div>
                            {{-- <div class="tab-pane fade" id="profile_tab3" role="tabpanel">
                            ...2222
                        </div> --}}
                        </div>
                    </div>

                    <!--end::Navbar-->





                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

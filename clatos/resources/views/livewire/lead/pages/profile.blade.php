@extends('livewire.lead.layout')

@section('title', '| Lead-profile')
@section('lead-content')


<!--begin::Navbar-->
<div class="card  mb-4 ribbon ribbon-top ribbon-vertical  p-4 position-relative">
    @if ($lead->isBookmark)
    <div class="ribbon-label bg-warning  ">
        <i class="bi bi-star-fill fs-2 text-white"></i>
    </div>
    @endif
    <!--begin::Ribbon-->
    <!--end::Ribbon-->
    <div class="card-body p-0">
        <div class="ribbon ribbon-triangle ribbon-top-start border-primary rounded-4 rounded-end-0 rounded-bottom-0">
            <!--begin::Ribbon icon-->
            <div class="ribbon-icon m-n6 ">
                <a href="{{ route('lead.edit', ['id' => $lead->id]) }}" data-bs-toggle="tooltip" data-bs-toggle="tooltip" data-bs-delay-hide="1000" data-bs-placement="top" title="Edit">
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
                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $lead->name }}
                            ({{ $lead->id }})</a>
                        @if ($lead->isVip)
                        <a href="#" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="VIP">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                <span class="material-icons">
                                    verified
                                </span></span>
                            <!--end::Svg Icon-->
                        </a>
                        @endif
                        @if ($lead->isCustomer)
                        <a href="#" class="btn btn-sm btn-light-success fw-bold ms-2 fs-8 py-1 px-3">Customer</a>
                        @else
                        <a href="#" class="btn btn-sm btn-light-primary fw-bold ms-2 fs-8 py-1 px-3">Lead</a>
                        @endif
                    </div>
                    <!--end::Name-->

                    <!--begin::Info-->
                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">

                        @if ($lead->city || $lead->country || $lead->pincode)
                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary ms-5 mb-2">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                            <i class="ki-duotone ki-geolocation fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>
                            <!--end::Svg Icon-->{{ $lead->city ? $lead->city . ', ' : '' }}{{ $lead->state ? $lead->state . ', ' : '' }}{{ $lead->country ? $lead->country . ', ' : '' }}{{ $lead->pincode ? '(' . $lead->pincode . ')' : '' }}
                        </a>
                        @endif
                        @if ($lead->email)
                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                            <i class="ki-duotone ki-sms fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>
                            {{ $lead->email }}
                        </a>
                        @endif
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
                        <!--begin::Menu-->
                        <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px me-3  position-relative">
                            <!--begin::Svg Icon | cart-->
                            <span class="svg-icon svg-icon-muted svg-icon-2hx opacity-50">
                                <i class="ki-duotone ki-basket fs-2x">
                                    <i class="path1"></i>
                                    <i class="path2"></i>
                                    <i class="path3"></i>
                                    <i class="path4"></i>
                                </i>
                            </span>
                            <!--end::Svg Icon-->
                            <!--begin::badge-->
                            <span class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-primary">{{ $lead->carts->count() }}</span>
                            <!--end::badge-->
                        </div>
                        <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px  me-10 ">

                            <button class="btn btn-icon  btn-active-color-primary " data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <!--begin::Svg Icon | menu -->

                                <i class="ki-duotone ki-setting-4 fs-2x"></i>

                                <!--end::Svg Icon-->
                            </button>

                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-300px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="bookmark">
                                            Bookmark
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="bookmark" onclick="updateleadFlag('isBookmark','{{ $lead->id }}',{{ $lead->isBookmark == 1 ? '0' : '1' }})" {{ $lead->isBookmark == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="cold">
                                            Cold
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="cold" onclick="updateleadFlag('isCold','{{ $lead->id }}',{{ $lead->isCold == 1 ? '0' : '1' }})" {{ $lead->isCold == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="junk">
                                            Junk
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="junk" onclick="updateleadFlag('isJunk','{{ $lead->id }}',{{ $lead->isJunk == 1 ? '0' : '1' }})" {{ $lead->isJunk == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-danger form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="Block">
                                            Block
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="Block" onclick="updateleadFlag('isBlocked','{{ $lead->id }}',{{ $lead->isBlocked == 1 ? '0' : '1' }})" {{ $lead->isBlocked == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="dnd">
                                            DND
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="dnd" onclick="updateleadFlag('isDnd','{{ $lead->id }}',{{ $lead->isDnd == 1 ? '0' : '1' }})" {{ $lead->isDnd == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="reseller">
                                            Reseller
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" value="" id="reseller" onclick="updateleadFlag('isReseller','{{ $lead->id }}',{{ $lead->isReseller == 1 ? '0' : '1' }})" {{ $lead->isReseller == 1 ? 'checked' : '' }} />
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--Separator:: start-->
                                <div class="separator separator-dotted my-5"></div>
                                <!--Separator:: end-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 ">
                                    <div class="form-check form-switch form-check-custom form-check-success form-check-solid me-10 d-flex justify-content-between">
                                        <label class="form-check-label" for="vip">
                                            VIP
                                        </label>
                                        <input class="form-check-input h-20px w-30px" type="checkbox" id="vip" onclick="updateleadFlag('isVip','{{ $lead->id }}',{{ $lead->isVip == 1 ? '0' : '1' }})" {{ $lead->isVip == 1 ? 'checked' : '' }} />
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
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                            <!--begin::Number-->
                            <div class="d-flex align-items-center">
                                <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>
                                <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="{{ $lead->balance }}" data-kt-countup-prefix="₹" data-kt-initialized="1">
                                    ₹{{ $lead->balance }}</div>
                            </div>
                            <!--end::Number-->

                            <!--begin::Label-->
                            <div class="fw-semibold fs-6 text-gray-400">Balance</div>
                            <!--end::Label-->
                        </div>
                        <!--end::Stat-->
                        @endif

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
                        <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <!--end::Progress-->
            </div>
            <!--end::Stats-->
        </div>


        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_7">Billing
                    Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_8">Graphic Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_9">Cart</a>
            </li>

        </ul>
        <!--begin::Navs-->

        <!--begin::Navs-->
    </div>
</div>
<div class="card p-4">

    <div class="tab-content card" id="myTabContent">

        <div class="tab-pane fade show active" id="kt_tab_pane_7" role="tabpanel">
            <div class="card">

                <div class="table-responsive ">
                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold">

                            <tr class="text-center  align-middle">

                                <th>Primary</th>

                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Gst</th>
                                <th>Email</th>
                                <th>Mobile</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($addresses as $address)
                            <tr class="text-center  align-middle">

                                <td class="text-center">
                                    <span class="badge   badge-light-success">{!! $address->isPrimary ? 'Primary' : 'Not Primary' !!}</span>
                                </td>
                                <td>{{ $address->address ?? '-' }}</td>
                                <td>{{ $address->city ?? '-' }}</td>
                                <td>{{ $address->state ?? '-' }}</td>
                                <td>{{ $address->country ?? '-' }}</td>
                                <td>{{ $address->gst ?? '-' }}</td>
                                <td>{{ Str::mask($address->email, '*', 1, 5) ?? '-' }}</td>
                                <td>{{ Str::mask($address->mobile, '*', 2, 5) ?? '-' }}</td>
                                <td><a href="{{ route('lead.address.edit', ['id' => Crypt::encrypt($address->id)]) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-info ">
                                    <h1>No Address Yet</h1>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                    {{ $addresses->links() }}
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="kt_tab_pane_8" role="tabpanel">
            <div class="card">
                <div class="table-responsive p-2">
                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold ">

                            <tr class="text-center  align-middle">

                                <th class="px-3 py-2">Number of Project</th>
                                <th class="px-3 py-2">Start Date</th>
                                <th class="px-3 py-2">End Date</th>
                                <th class="px-3 py-2">Graphic Plan</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $plan)
                            <tr class="  align-middle">

                                <td class="p-2 text-center">{!! $plan->noOfProjects == -1
                                    ? '<span class="material-icons-round text-success fs-2"> all_inclusive</span>'
                                    : $plan->noOfProjects !!}</td>
                                <td class="p-2 text-center">{{ $plan->startDate }}</td>
                                <td class="p-2 text-center">{{ $plan->endDate }}</td>
                                <td class="p-2 text-center">{{ $plan->plan->title ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-info ">
                                    <h2 class="text-capitalize">
                                        No record Found
                                    </h2>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade " id="kt_tab_pane_9" role="tabpanel">
            <div class="card">
                <div class="table-responsive p-2">
                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold ">

                            <tr class="text-center  align-middle">
                                <th class="px-3 py-2">Product</th>
                                <th class="px-3 py-2">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                            <tr class="  align-middle">


                                <td class="p-2 text-center">{{ $cart->Product->name . '\'s' }}
                                    {{ $cart->ProductVariant->name ?? $cart->Product->name }}
                                </td>

                                <td class="p-2 text-center">
                                    {{ $cart->quantity }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-info ">
                                    <h2 class="text-capitalize">
                                        No record Found
                                    </h2>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
<!--end::Navbar-->
{{--
    "id" => 1
        "product_id" => 26
        "product_variant_id" => 24
        "lead_id" => 2
        "quantity" => 1
        "agent_id" => null
        "ts" => "2023-04-08 10:26:50"
         --}}
@endsection
@section('scripts')
<script>
    var url = "{{ route('lead.update.flag') }}"
    var token = '{{ csrf_token() }}';

    function updateleadFlag(field, lead_id, value) {
        updateFlag(url, field, lead_id, value, token)
    }
</script>
<script src="{{ asset('js/custom.js') }}"></script>

@endsection
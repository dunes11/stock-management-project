@extends('layouts.app')
@section('title', ' | Searce')
@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Search &nbsp;</li>
    <!--end::Item-->
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h2>Reasults</h2>
            </div>
        </div>
        <div class="card-body">
            @include('layouts.components.alerts')
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
                                        <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold w-50px"
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
                                                <span class="fs-4 fw-semibold">{{ $item->accManager->name ?? '' }}</span>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <h1 class="text-danger">No Leads Yet</h1>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            <!--end::Tap pane-->
        </div>
    </div>
@endsection

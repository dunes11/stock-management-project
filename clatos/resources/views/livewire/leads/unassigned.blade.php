@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Unassigned Leads &nbsp;</li>
    <!--end::Item-->
@endsection
@section('title', '| Leads-Unassigned')

<div class=" card rounded rounded-4  mb-5 mb-xl-8">
    <div class="card-body p-3" wire:poll.5s>
        @include('layouts.components.alerts')
        <!--begin::Body-->
        <!--begin::Table container-->
        <div class="table-responsive ">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-2  table-row-bordered table-hover" id="leadsTable">
                <!--begin::Table head-->
                <thead class="bg-gray-800 text-gray-200 text-center">
                    <tr>
                        <th class="p-2 min-w-150px text-capitalize ">name</th>
                        <th class="p-2 min-w-150px text-capitalize">contact</th>
                        <th class="p-2 min-w-150px text-capitalize">manager</th>
                        <th class="p-2 min-w-150px text-capitalize">Language</th>
                        <th class="p-2 min-w-150px text-capitalize">Lead For</th>
                        <th class="p-2 min-w-150px text-capitalize">Created Date</th>
                        <th class="p-2 min-w-150px text-capitalize">Address</th>
                        <th class="p-2 min-w-150px text-capitalize">Action</th>

                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody class="text-center  align-middle">

                    @forelse ($leads as $item)
                        <tr class=" ">
                            <td>
                                <a href="{{ route('lead.profile', ['lead' => $item->id]) }}"
                                    class="text-dark fw-bold text-hover-primary fs-6 d-block">

                                    {{ $item->name }}</a>
                            </td>
                            <td class="">
                                <span
                                    class="text-dark fw-bold text-hover-primary fs-6 d-block">{!! $item->mobile !!}</span>
                            </td>
                            <!-- manager :: begin -->
                            <td class="">
                                <div class="text-center btn btn-icon">
                                    <!--begin::Menu-->
                                    <div class="menu menu-rounded menu-column menu-gray-600 menu-state-bg fw-semibold w-100"
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
                                                <div class="menu-sub menu-sub-dropdown p-3 w-200px">
                                                    @foreach ($users as $user)
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item">
                                                            <a onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                                                class="menu-link px-1 py-3"
                                                                wire:click="UserChange({{ $item->id }},{{ $user->id }})">
                                                                <span class="menu-bullet me-0">
                                                                    <span class="bullet bullet-dot"></span>
                                                                </span>
                                                                <span class="menu-title">{{ $user->name ?? '' }}</span>
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

                            <td>
                                <span class="fw-semibold text-capitalize">
                                    @if ($item->language == 0)
                                        any
                                    @elseif ($item->language == 1)
                                        hindi
                                    @elseif ($item->language == 2)
                                        english
                                    @endif
                                </span>

                            </td>

                            <!-- lead for :: begin -->
                            <td>
                                @foreach ($item->leadFor() as $prds)
                                    {{-- {{ $prds->name}} --}}
                                    <span class="fw-semibold">
                                        {{ $prds->name }}
                                    </span>

                                    {!! $loop->last ? '' : ' , </br>' !!}
                                @endforeach
                            </td>
                            <!-- lead for :: end -->
                            <td class="">
                                <span>
                                    {{ date(env('DATEFORMATE') . ' h :i :s', strtotime($item->date)) }}
                                </span>
                            </td>

                            <td class="">
                                <span class="fs-5 fw-normal">

                                    {{ $item->city ? $item->city . ', ' : '' }}{{ $item->state ? $item->state . ', ' : '' }}{{ $item->country ? $item->country . ', ' : '-' }}{{ $item->pincode ? '(' . $item->pincode . ')' : '' }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary rounded rounded-pill">Edit</button>
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
        <!--end::Body-->
    </div>
</div>

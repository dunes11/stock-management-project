@php
    // dd($lead_grab);
@endphp

@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Lead Grab Requests &nbsp;
    </li>
    <!--end::Item-->
@endsection
<div class=" card rounded rounded-4  mb-5 mb-xl-8">
    {{-- <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        @include('layouts.components.alerts')
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6"><svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                        </rect>
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="currentColor"></path>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-customer-table-filter="search" wire:model="" wire:keydown.enter="#"
                    class="form-control form-control-solid w-250px ps-15" placeholder="Search User">
            </div>
            <!--end::Search-->
        </div>
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <!--begin::Export-->
            <a href="#" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                data-bs-target="#kt_customers_export_modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                            transform="rotate(90 12.75 4.25)" fill="currentColor"></rect>
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
            <!--end::Export-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card toolbar--> --}}
    <div class="card-body p-3" wire:poll.5s>
        <!--begin::Body-->
        <!--begin::Table container-->
        <div class="table-responsive ">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-2  table-row-bordered table-hover">
                <!--begin::Table head-->
                <thead class="bg-gray-800 text-gray-200 text-center">
                    <tr>
                        <th class="p-2 min-w-150px text-capitalize ">Lead</th>
                        <th class="p-2 min-w-150px text-capitalize">Request Date</th>
                        <th class="p-2 min-w-150px text-capitalize">Purpose</th>
                        <th class="p-2 min-w-150px text-capitalize">Old Manager</th>
                        <th class="p-2 min-w-150px text-capitalize">new manager</th>
                        <th class="p-2 min-w-150px text-capitalize">Change by user</th>
                        <th class="p-2 min-w-150px text-capitalize">Action</th>
                    </tr>
                </thead>

                <tbody class="text-center  align-middle">
                    <!--begin::Table row-->
                    @foreach ($leads as $item)
                        <tr>

                            <td>
                                <a href="{{ route('lead.profile', ['lead' => $item->lead_id]) }}"
                                    class="text-gray-800 text-hover-primary mb-1">
                                    {{ $item->lead->name ?? '-' }}

                                </a>
                            </td>
                            <!--end:: Lead Name  --->
                            <td>
                                <span class="text-gray-600 text-hover-gray-800 mb-1">
                                    {{ $item->datetime ? date(env('DATEFORMATE') . ' H:i:s', strtotime($item->datetime)) : '-' }}
                                </span>
                            </td>
                            <td>

                                {{ $item->purpose ?? '-' }}

                            </td>
                            <td>

                                {{ $item->oldAssignTo->name ?? '-' }}
                            </td>
                            <td>

                                {{ $item->newAssignTo->name ?? '-' }}
                            </td>
                            <!--end::newAssignTo  --->

                            <!--begin::change by user  --->
                            <td>

                                {{ $item->changeByuser->name ?? '-' }}
                            </td>
                            <!--end::change by user  --->
                            <td>
                                <button class="btn btn-success btn-sm rounded-pill p-2"
                                    onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                    wire:click="approve({{ $item->id }})">Approve</button>
                                <button class="btn btn-danger btn-sm rounded-pill p-2"
                                    onclick="confirm('Delete request ?') || event.stopImmediatePropagation()"
                                    wire:click.="reject({{ $item->id }})">Delete</button>
                            </td>
                            {{-- 
                            <!-- begin Action Button -->
                            <td class="">
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0"><svg width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                            Approve
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                </div>
                                <!--end::Menu-->
                            </td>
                            <!-- end Action Button --> --}}
                        </tr>
                    @endforeach
                    <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
            </table>
        </div>
    </div>
    <!--end::Table-->
</div>
<!--end::Card body-->

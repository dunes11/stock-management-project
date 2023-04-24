@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
       Support Ticket  &nbsp;</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Complete &nbsp;</li>
    <!--end::Item-->
@endsection

@php 
 //dd($supportCompleteList);
@endphp

<div>
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
                    <input type="text" data-kt-customer-table-filter="search" wire:model=""
                        wire:keydown.enter="#" class="form-control form-control-solid w-250px ps-15"
                        placeholder="Search">
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
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
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <div id="kt_customers_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="table-responsive">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                    id="kt_customers_table">
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">

                         
                            <th wire:click="" class="min-w-125px sorting" tabindex="0"
                                aria-controls="kt_customers_table" rowspan="1" colspan="1"
                                aria-label="Email: activate to sort column ascending" style="width: 173.852px;">
                                Lead</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending"
                                style="width: 154.239px;">
                                Ticket Number</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending" style="width: 182.591px;">
                                Subject
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending" style="width: 182.591px;">
                                Product
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending"
                                style="width: 182.591px;">
                                Assigned To
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending"
                                style="width: 182.591px;">
                                Assigned By
                            </th>
                            <th class="min-w-250px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending"
                                style="width: 250.591px;">
                                Preferred Mode Of Contact
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending"
                                style="width: 182.591px;">
                                Preferred Time
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_customers_table"
                                rowspan="1" colspan="1"
                                aria-label="Created Date: activate to sort column ascending"
                                style="width: 182.591px;">
                                Status
                            </th>
                            
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->

                    <!--begin::Table body-->
                    <tbody class="fw-semibold text-gray-600">
                        <!--begin::Table row-->
                        @foreach ($supportCompleteList as $supportCompleteListData)
                            <tr class="odd">


                                <!--begin::lead Name --->
                                <td>
                                    <a href="#" class="text-gray-800 text-hover-primary mb-1">
                                        {{ $supportCompleteListData->lead->name ?? 'NULL' }}
                                        {{ $supportCompleteListData->lead->id ?? 'NULL' }}
                                    </a>
                                </td>
                                <!--end::lead Name --->

                                <!--begin::ticketNumber --->
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">
                                        {{ $supportCompleteListData->ticketNumber }}</a>

                                    </a>
                                </td>
                                <!--end::ticketNumber --->

                                <!--begin::subject name --->
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{ $supportCompleteListData->subject }}
                                    </a>

                                </td>
                                <!--end::subject name --->

                                <!--begin::product name --->
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{ $supportCompleteListData->product->name??"NULL"  }}</a>
                                </td>
                                <!--end::product name --->

                                <!--begin::assignTo_id --->
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{ $supportCompleteListData->assignedTo->name ?? 'NULL' }}</a>
                                </td>
                                <!--end::assignTo_id --->

                                <!--begin::assignedBy_id --->
                                <td>
                                    <a href="#"
                                        class="text-gray-600 text-hover-primary mb-1">{{ $supportCompleteListData->assignedBy->name ?? 'NULL' }}</a>
                                </td>
                                <!--end::assignedBy_id --->

                                <!--begin::preferredModeOfContact --->
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">
                                        @if ($supportCompleteListData->preferredModeOfContact == 0)
                                            <a href="#" class="text-gray-600 text-hover-primary mb-1">Call</a>
                                        @elseif($supportCompleteListData->preferredModeOfContact == 1)
                                            <a href="#" class="text-gray-600 text-hover-primary mb-1">Email</a>
                                        @else
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">WhatsApp</a>
                                        @endif
                                    </a>
                                </td>
                                <!--end::preferredModeOfContact --->


                                <!-- begin preferredTime  -->
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">
                                        @if ($supportCompleteListData->preferredTime == 0)
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Morning</a>
                                        @elseif($supportCompleteListData->preferredTime == 1)
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Afternoon</a>
                                        @elseif($supportCompleteListData->preferredTime == 2)
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Evening</a>
                                        @else
                                            <a href="#" class="text-gray-600 text-hover-primary mb-1">Night</a>
                                        @endif
                                    </a>
                                </td>
                                <!-- end preferredTime  -->

                                <!-- begin status  -->
                                <td>
                                    <a href="#" class="text-gray-600 text-hover-primary mb-1">
                                        @if ($supportCompleteListData->status == 0)
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Pending</a>
                                        @elseif($supportCompleteListData->status == 1)
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Processing</a>
                                        @else
                                            <a href="#"
                                                class="text-gray-600 text-hover-primary mb-1">Complete</a>
                                        @endif
                                    </a>
                                </td>
                                <!-- end status  --> 
                            </tr>
                        @endforeach
                        <!--end::Table row-->
                    </tbody>
                    <!--end::Table body-->
                </table>
            </div>
            {{-- {{ $supportProcessingList->links('pagination::bootstrap-5') }} --}}
        </div>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>


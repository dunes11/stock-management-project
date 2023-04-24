@extends('livewire.lead.layout')
@section('lead-content')

<div class="card ">
    <div class="card-body">



        <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">Graphic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Link 3</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">

                <div class="table-responsive">
                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold">
                            <tr class="text-center align-middle">
                                <th class="px-3 py-2">Title</th>
                                <th class="px-3 py-2">Status</th>
                                <th class="px-3 py-2">Manager Remarks</th>
                                <th class="px-3 py-2">Delivery Type</th>
                                <th class="px-3 py-2">Brand</th>
                                <th class="px-3 py-2">Plan</th>
                                <th class="px-3 py-2">Customer Ratings</th>
                                <th class="px-3 py-2">Customer feedback</th>

                                <th class="px-3 py-2 w-150px">Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($graphic as $item)
                            <tr class="  align-middle">
                         
                                <td class="p-2 text-center">{{ $item->title ?? '-' }}</td>
                                <td class="p-2 text-center">
                                    @php
                                    $status = match ($item->status) {
                                    0 => 'Draft',
                                    1 => 'Unassigned',
                                    2 => 'Assigned',
                                    3 => 'QC Pending',
                                    4 => 'Sent to Customer',
                                    5 => 'Need Revision',
                                    6 => 'Completed',
                                    default => 'undefiend',
                                    };
                                    @endphp
                                    {{ $status ?? '-' }}
                                </td>
                                <td class="p-2 text-center">{{ $item->graphicsManagerRemark ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $item->deliveryType->name ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $item->brand->name ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $item->plan->title ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $item->customerRating ?? '-' }}</td>
                                <td class="p-2 text-center">{{ $item->customerFeedback ?? '-' }}</td>
                                <td class="p-2 text-center fs-7">
                                    {{ $item->ts ? date(env('DATEFORMATE'), strtotime($item->ts)) : '-' }}
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center">
                                <h2 class="text-capitalize">
                               No record Found
                            </h2>
                                </td>
                            </tr>
                            @endforelse
                            <tr>
                                <td colspan="12">
                                    {!! $graphic->render() !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                ...
            </div>
            <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                ...
            </div>
        </div>
    </div>
</div>
@endsection
@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                        <th class="px-3 py-2">License</th>
                        <th class="px-3 py-2">Type</th>
                        <th class="px-3 py-2">Old H/W</th>
                        <th class="px-3 py-2">Requester</th>
                        <th class="px-3 py-2">Request Remark</th>
                        <th class="px-3 py-2">Rejection Remark</th>
                        <th class="px-3 py-2">Approved </th>
                        <th class="px-3 py-2">Approval Remark</th>
                        <th class="px-3 py-2">Approved By</th>
                        <th class="px-3 py-2">Old Product</th>
                        <th class="px-3 py-2">New Product</th>


                        <th class="px-3 py-2 w-150px">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($records as $item)
                    <tr class="  align-middle">

                        <td class="p-2 text-center ">{{ $item->license->key ?? '-' }} </td>
                        <td class="p-2 text-center">
                            @php
                            $type = match ($item->type) {
                            0 => ' hardware Id reset',
                            1 => ' product upgrade',
                            default => 'undefiend',
                            };
                            @endphp
                            {{ $type ?? '-' }}
                        </td>
                        <td class="p-2 text-center">{{ $item->oldHw_id ?? '-' }}</td>

                        <td class="p-2 text-center">{{ $item->requester->name ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->requsterRemark ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->rejectionRemark ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->isApproved == 1 ? 'Yes' : 'No' }}</td>
                        <td class="p-2 text-center">{{ $item->approvalRemark ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->approvedBy_id ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->oldProduct->name ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->newProduct->name ?? '-' }}</td>

                        <td class="p-2 text-center fs-7">
                            {{ $item->datetime ? date(env('DATEFORMATE'), strtotime($item->datetime)) : '-' }}
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
                            {!! $records->render() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
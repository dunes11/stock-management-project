@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                 
                        <th class="p-1 ">Invoice</th>
                        <th class="p-1 ">Date Time</th>
                        <th class="p-1 ">Amount</th>
                        <th class="p-1 ">Company</th>
                        <th class="p-1 ">Payment Mode</th>
                        <th class="p-1 ">GateWay Transaction</th>
                        <th class="p-1 ">Payment SS</th>
                        <th class="p-1 ">Payment Purpose</th>
                        <th class="p-1 ">Remarks</th>
                        <th class="p-1 ">Approved</th>
                        <th class="p-1 ">Manager</th>
                        <th class="p-1 ">Operator</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $item)
                    <tr class="fs-6 text-center align-middle ">
                       
                        <td class="p-1 text-nowrap ">
                            {{ $item->invoice->invoiceNumber ?? ($item->invoice->proformaNumber ?? '-') }}
                        </td>
                        <td class="p-1 fs-7 ">
                            {{ $item->transactionDateTime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->transactionDateTime)) : '-' }}
                        </td>
                        <td class="p-1 text-wrap "> {{ $item->amount ?? '-' }}</td>
                        <td class="p-1 text-wrap ">{{ $item->company ?? '-' }}</td>
                        <td class="p-1 text-wrap ">{{ $item->payment_mode->mode ?? '-' }} </td>
                        <td class="px-2 py-2 ">{{ $item->isGatewayTransaction == 1 ? 'YES' : 'NO' }}</td>
                        <td class="p-1  ">
                            @if ($item->paymentScreenshot)
                            <div class="card">
                                <img src="{{ $item->paymentScreenshot }}" alt="" class="img-fluid h-150px">
                            </div>
                            @endif
                        </td>
                        <td class="p-1 text-wrap ">{{ $item->paymentPurpose ?? '-' }} </td>
                        <td class="p-1 text-wrap ">{{ $item->remarks ?? '-' }} </td>
                        <td class="p-2 ">{{ $item->isApproved == 1 ? 'YES' : 'NO' }}</td>
                        <td class="p-1 text-wrap ">{{ $item->manager->name ?? '-' }} </td>
                        <td class="p-1 text-wrap ">{{ $item->operator->name ?? '-' }} </td>
                    </tr>

                    @empty
                    <tr>
                        <td></td>
                        <td colspan="8" class="text-center">
                        <h2 class="text-capitalize">
                               No record Found
                            </h2>
                        </td>
                        <td></td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="13">{!! $transactions->render() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
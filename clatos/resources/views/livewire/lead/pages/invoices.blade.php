@extends('livewire.lead.layout')
@section('lead-content')


<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table g-4 fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                        <th class=""> Invoice Number</th>
                        <th class=""> Date</th>
                        <th class="w-300px"> Items</th>
                        <th class="">Amount</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                    <tr class="text-center">

                        <td class="">{{ $invoice->proformaNumber ?? ($invoice->invoiceNumber ?? '-') }}</td>
                        <td class="">
                            @if ($invoice->date)
                            {{ date(env('DATEFORMATE'), strtotime($invoice->date)) }}
                            @endif
                        </td>
                        <td class="text-wrap">
                            @foreach ($invoice->items as $item)
                            {{ $item->variantData->name }}{{ $loop->last ? ' ' : ',' }}
                            @endforeach
                        </td>
                        <td class="">
                            @php $total = 0; @endphp
                            @foreach ($invoice->items as $item)
                            @php $total+=$item->total; @endphp
                            @endforeach
                            {{ $total }}
                        </td>


                    </tr>

                    @empty
                    <tr>
                        <td class="" colspan="5">
                            <h2 class="text-capitalize">
                                No record Found
                            </h2>
                        </td>
                    </tr>
                    @endforelse

                    <tr>
                        <td colspan="5"> {!! $invoices->render() !!}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
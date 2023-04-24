@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
       
                        <th class="px-3 py-2 w-lg-200px ">Created Date</th>
                        <th class="px-3 py-2">Invoice ID</th>
                        <th class="px-3 py-2">Items</th>
                        <th class="px-3 py-2">Remark</th>
                        <th class="px-3 py-2">isApproved</th>
                        <th class="px-3 py-2">Account Manager</th>

                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $item)
                    <tr class="fs-6  text-center align-middle">
             
                        <td class="px-3 py-2 text-break ">
                            {{ $item->date ? date(env('DATEFORMATE') . ' H : i', strtotime($item->date)) : '-' }}
                        </td>
                        <td class="px-3 py-2 text-wrap ">
                            {{ $item->invoice->invoiceNumber ?? ($item->invoice->proformaNumber ?? '-') }}
                        </td>
                        <td class="px-3 py-2 text-break ">
                            @foreach ($item->items as $product)
                            {{ $product->product->name ?? '-' }}
                            @if (!$loop->last)
                            {{ ' , ' }}
                            @endif
                            @endforeach
                        </td>
                        <td class="px-3 py-2 r">{{ $item->remarks ?? '-' }}</td>
                        <td class="px-2 py-2 ">{{ $item->isApproved == 1 ? 'YES' : 'NO' }}</td>
                        <td class="px-3 py-2 ">{{ $item->manager->name ?? '--' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">
                        <h2 class="text-capitalize">
                               No record Found
                            </h2>
                        </td>
                    </tr>
                    @endforelse
                    <tr>
                        <td colspan="6"> {!! $orders->render() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
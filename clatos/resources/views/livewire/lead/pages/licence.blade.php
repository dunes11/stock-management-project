@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                        <th class="px-3 py-2">Activated On</th>
                        <th class="px-3 py-2">Hardware ID </th>
                        <th class="px-3 py-2">KEY </th>
                        <th class="px-3 py-2">Vresion</th>
                        <th class="px-3 py-2">Product</th>
                        <th class="px-3 py-2">Period</th>
                        <th class="px-3 py-2">Expiry Date</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Remarks</th>
                        <th class="px-3 py-2">Oprator</th>

                        <th class="px-3 py-2 w-150px">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($license as $item)
                    <tr class="  align-middle">

                        <td class="p-2 text-center fs-7">
                            {{ $item->activationDateTime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->activationDateTime)) : '-' }}
                        </td>
                        <td class="p-2 text-center">{{ $item->hardwareId ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->key ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->version ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->nameOnSoftware ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->period ?? '-' }}</td>
                        <td class="p-2 text-center fs-7">
                            {{ $item->expiryDateTime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->expiryDateTime)) : '-' }}
                        </td>
                        <td class="p-2 text-center">{{ $item->isActive == 1 ? 'Active' : 'Not Active' }}</td>
                        <td class="p-2 text-center">{{ $item->remarks ?? '-' }}</td>
                        <td class="p-2 text-center">{{ $item->operator->name ?? '-' }}</td>
                        <td class="px-3 py-2 fs-7">
                            {{ $item->datetime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->datetime)) : '-' }}
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
                            {!! $license->render() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
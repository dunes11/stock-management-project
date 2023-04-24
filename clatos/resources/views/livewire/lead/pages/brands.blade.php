@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Logo</th>
                        <th class="px-3 py-2">Description</th>
                        <th class="px-3 py-2">Wesite</th>
                        <th class="px-3 py-2">Guideline</th>
                        <th class="px-3 py-2">Colours</th>

                        <th class="px-3 py-2 w-150px">Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($brands as $item)
                    <tr class="  align-middle">

                        <td class="p-2 text-center">{{ $item->name }}</td>
                        <td class="p-2 text-center">
                            @if ($item->logo)
                            <div class="symbol symbol-50px">
                                <div class="symbol-label" style="background-image:url({{ App\Helpers\AWSs3::show(hostData()->adminHostname . '/' . $item->getTable() . '/' . $item->logo) }})">
                                </div>
                            </div>
                            @endif
                        </td>
                        <td class="p-2 text-center">{{ $item->description }}</td>
                        <td class="p-2 text-center">{{ $item->website }}</td>
                        <td class="p-2 text-center">{{ $item->guideline }}</td>
                        <td class="p-2 text-center">{{ $item->colors }}</td>
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
                            {!! $brands->render() !!}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
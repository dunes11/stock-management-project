@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">
                        <th class="p-1 ">Name</th>
                        <th class="p-1 ">Document</th>
                        <th class="p-1 ">Operator</th>
                        <th class="p-1 ">Date Time</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($document as $item)
                    <tr class="fs-6 text-center align-middle ">

                        <td class="p-1 text-nowrap ">
                            {{ $item->name }}
                        </td>
                        <td class="p-1 ">
                            @if ($item->path)
                            <div class="card">
                                <img src="{{ $item->path }}" alt="" class="img-fluid">
                            </div>
                            @endif
                        </td>
                        <td class="p-1">{{ $item->operator->name }}</td>
                        <td class="p-1">
                            {{ $item->datetime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->datetime)) : '-' }}
                        </td>

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
                        <td colspan="13">{!! $document->render() !!}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
    @endsection
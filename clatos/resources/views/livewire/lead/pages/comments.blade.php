@extends('livewire.lead.layout')
@section('lead-content')
    <div class="card ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                    <thead class="fw-semibold">
                        <tr class="text-center align-middle">
                            
                            <th class="px-3 py-2">Comment</th>
                            <th class="px-3 py-2">Operator</th>
                            <th class="px-3 py-2 w-150px">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($comments as $item)
                            <tr class="fs-6 ">
                                
                                <td class="px-3 py-2 text-wrap ">{{ $item->comment }}</td>

                                <td class="px-3 py-2 text-center">{{ $item->operator->name ?? '--' }}</td>
                                <td class="px-3 py-2 text-nowrap">
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
                            <td colspan="10">{!! $comments->render() !!}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

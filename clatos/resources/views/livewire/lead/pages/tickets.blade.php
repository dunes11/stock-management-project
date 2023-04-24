@extends('livewire.lead.layout')
@section('lead-content')
    <div class="card ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                    <thead class="fw-semibold">
                        <tr class="text-center align-middle">
                            <th class="">Subject</th>
                            <th class="">Purpose</th>
                            <th class="">Product</th>
                            <th class="">Status</th>
                            <th class="">Date</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $item)
                            <tr class="text-center">

                                <td class=" ">{{ $item->subject }}</td>
                                <td class=" "> {{ $item->purpose }}</td>
                                <td class=" ">{{ $item->productDetails->name ?? '-' }}</td>
                                <td class=" ">
                                    @php
                                        $status = match ($item->isDone) {
                                            0 => '<span class="badge badge-light-danger">Pending</span>',
                                            1 => '<span class="badge badge-light-success">Complete</span>',
                                            default => '-',
                                        };
                                    @endphp
                                    {!! $status !!}
                                </td>
                                <td class=" ">
                                    {{ date(env('DATEFORMATE') . ' H : i', strtotime($item->datetime)) }}
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
                            {{-- <td>{{Blade::render( $tickets); }}</td> --}}
                            <td colspan="7">{!! $tickets->render() !!}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

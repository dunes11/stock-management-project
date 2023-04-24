@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">


                        <th class="">Call ID</th>
                        <th class="">Status</th>
                        <th class="">Agent</th>
                        <th class="">Recording</th>

                        <th class="">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($callLogs as $item)
                    <tr class="fs-6 align-middle text-center">

                        <td class=" text-wrap ">{{ $item->call_id }}</td>
                        <td class=" text-wrap text-center">
                            @php
                            $status = $item->status;
                            $badgecolor = match ($item->status) {
                            'answered' => 'badge-light-success',
                            'missed' => 'badge-light-danger',
                            default => 'badge-light-info',
                            };
                            @endphp
                            <span class="badge {!! $badgecolor !!}">
                                {{ $status }}
                            </span>
                        </td>

                        <td class=" text-wrap ">{{ $item->agent_id }}</td>


                        <td class="  ">
                            @if ($item->answeredSeconds != 0)
                            <audio controls>
                                <source src="{{ $item->recordingUrl }}" type="audio/mpeg">
                            </audio>
                            @else
                            ---
                            @endif
                        </td>
                        <td class=" text-nowrap">
                            {{ $item->date ? date(env('DATEFORMATE') . ' h : i', strtotime($item->date)) : '-' }}
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
                        <td colspan="10">{!! $callLogs->render() !!}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
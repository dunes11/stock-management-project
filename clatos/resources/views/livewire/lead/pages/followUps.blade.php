@extends('livewire.lead.layout')
@section('lead-content')


<div class="card ">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                <thead class="fw-semibold">
                    <tr class="text-center align-middle">


                        <th class="">Agent</th>
                        <th class="">Need Follow Up</th>
                        <th class="">Rating</th>
                        <th class="">Remark</th>
                        <th class="">FollowUp Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($followUp as $item)
                    <tr class="fs-6 text-center">
                        <td class="  ">{{ $item->agent->name ?? '--' }}</td>
                        <td class="  "><span class="badge badge-light-info">
                                {{ $item->followupNeeded ? 'YES' : 'NO ' }}</span>
                        </td>
                        <td class=" ">
                            @for ($i = 1; $i <= $item->rating; ++$i)
                                {!! '<i class="ki-duotone ki-star fs-1  text-warning"></i>' !!}
                                @endfor
                        </td>
                        <td class=" ">{{ $item->remark }}</td>
                        <td class=" ">
                            {{ date(env('DATEFORMATE') . ' H : i', strtotime($item->followupDateTime)) }}
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
                        <td colspan="10">{!! $followUp->render() !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
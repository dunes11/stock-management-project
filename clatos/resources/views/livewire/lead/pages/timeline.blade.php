@extends('livewire.lead.layout')

@section('title', '| Leads')
@section('lead-content')


<div class="card ">
    <div class="card-body h-700px overflow-auto">
        <div class="timeline">
            @forelse ($logs as $log)
            <!--begin::Timeline item-->
            <div class="timeline-item">
                <!--begin::Timeline line-->
                <div class="timeline-line w-40px"></div>
                <!--end::Timeline line-->

                <!--begin::Timeline icon-->
                <div class="timeline-icon symbol symbol-circle symbol-40px me-4">
                    <div class="symbol-label bg-light">
                        {!! $log->Icon() !!}
                    </div>
                </div>
                <!--end::Timeline icon-->

                <!--begin::Timeline content-->
                <div class="timeline-content mb-10 mt-n1">
                    <!--begin::Timeline heading-->
                    <div class="pe-3 mb-5">
                        <!--begin::Title-->
                        <div class="fs-5 fw-semibold mb-2">
                            {!! $log->heading() !!}
                        </div>
                        <!--end::Title-->

                        <!--begin::Description-->
                        <div class="d-flex align-items-center mt-1 fs-6">
                            <!--begin::Info-->
                            @php
                            $currentDate = new DateTime();
                            $date = new DateTime($log->datetime);
                            if ($currentDate->format('W') == $date->format('W')) {
                            $time = $date->format(env('DATEFORMATE') . ' h : 1');
                            } else {
                            $time = $date->format('D h:i');
                            }
                            @endphp
                            <div class="text-muted me-2 fs-7">Added at {{ $time }} PM
                                @if ($log->agent->name ?? 0 )
                                {{ ' by ' . $log->agent->name }}
                                @endif
                            </div>
                            <!--end::Info-->


                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Timeline heading-->

                    <!--begin::Timeline details-->
                    <div class="overflow-auto pb-5">

                        <!--begin::Record-->
                        <div class="d-flex align-items-center border border-dashed border-gray-300 rounded fs-3 text-break px-7 py-3 mb-0">
                            {!! $log->content !!}
                        </div>
                        <!--end::Record-->
                    </div>
                    <!--end::Timeline details-->
                </div>
                <!--end::Timeline content-->
            </div>
            <!--end::Timeline item-->
            @empty
            @endforelse

        </div>
    </div>
</div>

@endsection
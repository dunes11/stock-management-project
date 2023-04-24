@extends('livewire.lead.layout')
@section('lead-content')
    <div class="card ">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                    <thead class="fw-semibold">
                        <tr class="text-center align-middle">
                            <th class="">Name</th>
                            <th class="">Mobile</th>
                            <th class="">E-mail</th>
                            <th class="">Gen. Date</th>
                            <th class="">Address</th>
                            <th class="">Last Interaction</th>
                            <th class="">Status</th>
                            <th class="">Tags</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $item)
                            <tr class="fs-6 align-middle">

                                <td class=" text-wrap ">{{ $item->name }} </td>
                                <td class=" text-wrap ">{{ $item->mobile }}</td>
                                <td class=" text-wrap ">{{ $item->email }}</td>
                                <td class=" text-nowrap">{{ date(env('DATEFORMATE'), strtotime($item->date)) }}</td>
                                <td class=" text-wrap">
                                    {{ $item->city ? $item->city . ', ' : '' }}{{ $item->state ? $item->state . ', ' : '' }}{{ $item->country ? $item->country . ', ' : '' }}{{ $item->pincode ? '(' . $item->pincode . ')' : '' }}
                                </td>
                                <td class=" text-wrap">
                                    {{ $item->lastInteraction ? date(env('DATEFORMATE') . ' h : i', strtotime($item->lastInteraction)) : '-' }}
                                </td>
                                <td class=" ">
                                    <div class="badge" style="background-color: {!! $item->currentStatus->colorCode . '6b' !!};">
                                        {{ $item->currentStatus->name ?? '-' }}
                                    </div>
                                </td>
                                <td class=" h-100px overflow-auto">
                                    <span
                                        class="badge badge-light-success">{{ $item->isCustomer ? 'Customer' : 'lead' }}</span>
                                    <span class="badge badge-warning">{{ $item->isBookmark ? 'Bookmark' : '' }}</span>
                                    <span class="badge badge-danger">{{ $item->isBlocked ? 'Blocked' : '' }}</span>
                                    <span
                                        class="badge badge-light-success">{{ $item->isReseller ? 'Reseller' : '' }}</span>
                                    <span class="badge badge-secondary">{{ $item->isCold ? 'Cold' : '' }}</span>
                                    <span class="badge badge-light-secondary">{{ $item->isJunk ? 'Junk' : '' }}</span>
                                    <span class="badge badge-light-danger">{{ $item->isDnd ? 'DND' : '' }}</span>
                                </td>
                                <td class="">
                                    <a href="{{ route('lead.profile', ['lead' => $item->id]) }}"
                                        class="btn btn-light-primary btn-icon btn-sm">
                                        <span class="material-icons-round ">
                                            visibility
                                        </span>
                                    </a>
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
                            <td colspan="10">{!! $contacts->render() !!}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection

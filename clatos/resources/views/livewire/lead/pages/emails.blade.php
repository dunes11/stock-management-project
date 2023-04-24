@extends('livewire.lead.layout')
@section('lead-content')
<div class="card ">
    <div class="card-body">
        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Sent</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Recived</a>
            </li>

        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-2" id="kt_tab_pane_1" role="tabpanel">

                <div class="table-responsive">
                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold">
                            <tr class="text-center align-middle">
                                <th class="">Sender</th>
                                <th class="">E-Mail Address</th>
                                <th class=" ">Subject</th>
                                <th class=" ">Header</th>
                                <th class=" ">Message</th>
                                <th class="">Custom Message </th>
                                <th class=" ">Signature</th>
                                <th class=" ">Attachment</th>
                                <th class=" ">isSent</th>
                                <th class=" ">isApproved</th>
                                <th class=" ">Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($sent as $item)
                            <tr class=" align-middle text-center">

                                <td class=" text-nowrap">{{ $item->sender->name ?? '-' }}</td>
                                <td class="">{{ $item->email }}</td>
                                <td class="">{{ $item->subject }}</td>
                                <td class="">{{ $item->header }}</td>
                                <td class="">{{ $item->msg }}</td>
                                <td class="">{{ $item->custom_msg }}</td>
                                <td class="">{{ $item->signature }}</td>
                                <td class="">
                                    <a href="{{ $item->attachment }}" download="">Download</a>
                                </td>
                                <td class=""><span class="badge badge-light-info">
                                        {{ $item->isSent == 1 ? 'YES' : 'NO' }}</span></td>
                                <td class=""><span class="badge badge-light-primary">{{ $item->isApproved == 1 ? 'YES' : 'NO' }}</span>
                                </td>
                                <td class="text-nowrap">
                                    {{ $item->datetime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->datetime)) : '-' }}
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td></td>
                                <td colspan="11" class="text-center">
                                    <h2 class="text-capitalize">
                                        No record Found
                                    </h2>
                                </td>
                                <td></td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade p-2" id="kt_tab_pane_2" role="tabpanel">
                <div class="table-responsive">

                    <table class="table fs-6 fw-semibold table-row-bordered table-hover ">
                        <thead class="fw-semibold">
                            <tr class="text-center align-middle">
                                <th class="">Sender</th>
                                <th class="">Reciver</th>
                                <th class="">Subject</th>
                                <th class="">Message</th>
                                <th class="">Attachment</th>
                                <th class="">Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($recived as $item)
                            <tr class=" align-middle">

                                <td class=" ">{{ $item->senderEmail }}</td>
                                <td class="">{{ $item->receiverEmail }}</td>
                                <td class="">{{ $item->subject }}</td>
                                <td class="">{{ $item->msg }}</td>
                                <td class=""><a href=" {{ $item->attachment ?? '#' }}">Download</a>
                                </td>
                                <td class=" text-nowrap">
                                    {{ $item->datetime ? date(env('DATEFORMATE') . ' H : i', strtotime($item->datetime)) : '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <h2 class="text-capitalize">
                                        No record Found
                                    </h2>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
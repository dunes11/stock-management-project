@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Lead Transactions &nbsp;</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Edit &nbsp;</li>
    <!--end::Item-->
@endsection

@php 
// dd($post['id']);
@endphp
<div>
    <div class="card ">
        <div class="card-header">
            <div class="card-title fs-1">
                Lead Transactions Edit
            </div>
            <div class="card-toolbar">
                <div>
                    <a href="{{ route('transaction.list') }}" class="btn btn-primary">Leads Transactions</a>
                </div>
            </div>
        </div>

        <div class="card-body h-500px overflow-auto">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-lg-10 col-md-8 m-10 ">
                    <form wire:submit.prevent="leadTransactionFormEdit({{ $post['id'] }})">
                        <div class="row">
                            <!--begin::Transaction Date-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 me-10">
                                <input type="text" id="kt_datepicker_3" wire:model="post.transactionDateTime"
                                    value="{{ $post['transactionDateTime'] ?? '' }}" name="transactionDateTime"
                                    class="form-control  form-control-solid @error('post.transactionDateTime') is-invalid @enderror"
                                    id="floatingInputDateTime" placeholder="DateTime" required />
                                <label for="floatingInputDateTime " class="ps-10 required">Transaction Date</label>
                            </div>
                            <!--end::Transaction Date-->



                            <!--begin::lead_id-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                @php $post['lead_id'] = $lead_id; @endphp
                                <input type="text" wire:model="post.lead_id" value="{{ $lead_id }}"
                                    name="lead_id" class="form-control  form-control-solid"
                                    placeholder="{{ $lead_id }}" disabled />
                                <label for="floatingInputDateTime " class="ps-10 required">{{ $lead_id }}</label>
                            </div>
                            @error('post.lead_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::lead_id-->
                        </div>
                        <div class="row">
                            <!--begin::Invoice_id -->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 me-10">
                                <input type="text" wire:model="post.invoice_id"
                                    value="{{ $post['invoice_id'] ?? '' }}" name="invoice_id"
                                    class="form-control  form-control-solid @error('post.invoice_id') is-invalid @enderror"
                                    id="floatingInputinvoice_id" placeholder="invoice_id" />
                                <label for="floatingInputinvoice_id " class="ps-10">Invoice</label>
                                @error('post.invoice_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Invoice_id -->

                            <!--begin::Amount-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                <input type="amount" wire:model="post.amount" value="{{ $post['amount'] ?? '' }}"
                                    name="amount"
                                    class="form-control  form-control-solid @error('post.amount') is-invalid @enderror"
                                    id="floatingInputamount" placeholder="amount here..." required />
                                <label for="floatingInputamount " class="ps-10  required">Amount</label>
                                @error('post.amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Amount-->
                        </div>
                        <div class="row">
                            <!--begin::remarks-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 me-10">
                                <input type="remarks" wire:model="post.remarks" value="{{ $post['remarks'] ?? '' }}"
                                    name="remarks"
                                    class="form-control  form-control-solid @error('post.remarks') is-invalid @enderror"
                                    id="floatingInputremarks" placeholder="remarks here..." />
                                <label for="floatingInputremarks " class="ps-10 ">remarks</label>
                                @error('post.remarks')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::remarks-->
                            <!--begin::Payment Screenshot-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                <input type="file" wire:model="post.paymentScreenshot"
                                    value="{{ $post['paymentScreenshot'] ?? '' }}" name="paymentScreenshot"
                                    class="form-control  form-control-solid " id="floatingInputPScreenshot"
                                    placeholder="Payment Screenshot" />
                                <label for="floatingInputPScreenshot " class="ps-10 ">Payment Screenshot</label>

                                {{-- @if ($post['paymentScreenshot'])
                                <p>Selected file: {{ $post['paymentScreenshot']}}</p>
                            @endif --}}

                                @error('post.paymentScreenshot')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Payment Screenshot-->
                        </div>
                        <div class="row">
                            <!--begin::Transaction Id-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 me-10">
                                <input type="text" wire:model="post.transactionId"
                                    value="{{ $post['transactionId'] ?? '' }}" transactionId="transactionId"
                                    class="form-control  form-control-solid" id="floatingInputtransactionId"
                                    placeholder="Transaction Id" required />
                                <label for="floatingInputtransactionId " class="ps-10 required">Transaction Id</label>
                                @error('post.transactionId')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--end::Transaction Id-->
                            <!--begin::Payment Purpose-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                <input type="text" wire:model="post.paymentPurpose"
                                    value="{{ $post['paymentPurpose'] ?? '' }}" name="paymentPurpose"
                                    class="form-control  form-control-solid " id="floatingInputpaymentPurpose"
                                    placeholder="Payment Purpose" />
                                <label for="floatingInputpaymentPurpose " class="ps-10 ">Payment Purpose</label>
                            </div>
                            <!--end::Payment Purpose-->
                            @error('post.paymentPurpose')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row">
                            <!--begin::Gateway Transaction-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 me-10">
                                <div class="menu-item px-3 form-control-solid">
                                    <div
                                        class="form-check form-control-solid form-switch form-check-custom  me-10 d-flex justify-content-between">
                                        Gateway Transaction
                                        <input class="form-check-input h-20px w-30px"
                                            wire:model="post.isGatewayTransaction" type="checkbox"
                                            value="{{ 1 }}" id="floatingInputisGatewayTransaction">
                                    </div>
                                </div>
                            </div>
                            @error('post.isGatewayTransaction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::Gateway Transaction-->
                            <!--begin::isAproved-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">

                                Approved
                                <input class="form-check-input" wire:model="post.isApproved" name="isApproved"
                                    type="radio" value="{{ 1 }}" />Yes

                                <input class="form-check-input" wire:model="post.isApproved" name="isApproved"
                                    type="radio" value="{{ 0 }}" />No

                            </div>
                            @error('post.isApproved')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end::isAproved-->
                        </div>
                        <!--begin::company Name-->
                        <div class=" row row-cols-4 mb-7">
                            <div class="col-12 fs-1 fw-bold">Company</div>
                            @foreach ($companyData as $company_Data)
                                <div class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom ">
                                    <input class="form-check-input" wire:model="post.company_id" name="company_id"
                                        type="radio" value="{{ $company_Data->id }}"
                                        id="flexRadioDefault{{ $company_Data->id }}" />
                                    <label class="form-check-label w-100">
                                        {{ $company_Data->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('post.company_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::company Name-->


                        <!--begin::AccountManager_id-->
                        <div class=" row row-cols-4 mb-7 d-lg-inline-flex ">
                            <div class="col-12 fs-1 fw-bold">Account Manger </div>
                            @foreach ($accountMangerData as $accountManger_Data)
                                <div class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom ">
                                    <input class="form-check-input" wire:model="post.accountManager_id"
                                        name="accountManager_id" type="radio"
                                        value="{{ $accountManger_Data->id }}"
                                        id="flexRadioDefault{{ $accountManger_Data->id }}" />
                                    <label class="form-check-label w-100">
                                        {{ $accountManger_Data->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('post.accountManager_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::AccountManager_id-->

                        <!--begin::Payment Mode-->
                        <div class=" row row-cols-4 mb-7 d-lg-inline-flex ">
                            <div class="col-12 fs-1 fw-bold required">Payment Mode </div>
                            @foreach ($paymentData as $payment_Data)
                                <div class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom ">
                                    <input class="form-check-input" wire:model="post.paymentMode_id"
                                        name="paymentMode_id" type="radio" value="{{ $payment_Data->id }}"
                                        id="flexRadioDefault{{ $payment_Data->id }}" required />
                                    <label class="form-check-label w-100 ">
                                        {{ $payment_Data->mode }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('post.paymentMode_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!--end::Payment Mode -->

                        <div class="row text-end mb-7">
                            <div class="col">
                                <button class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $("#kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    </script>

@endsection
@section('title', '| Lead Transaction')

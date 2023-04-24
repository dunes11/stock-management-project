@section('breadcrumb')
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Invoice &nbsp;</li>
    <!--end::Item-->
    <!--begin::Item-->
    <li class="breadcrumb-item text-gray-600">
        Add &nbsp;</li>
    <!--end::Item-->
@endsection

@php
    //dd($orderItem);
@endphp


<div>
    <div class="card ">
        <div class="card-header">
            <div class="card-title fs-1">
                Lead Transactions Add
            </div>
            <div class="card-toolbar">
                <div>
                    <a href="{{ route('transaction.list') }}" class="btn btn-primary">Invoice Add</a>
                </div>
            </div>
        </div>

        <div class="card-body h-500px overflow-auto">
            <div class="row justify-content-center">
                <div class=" col-sm-12 col-lg-10 col-md-8 m-10 ">
                    <form wire:submit.prevent="addInvoice">
                        <div class="row">


                            <!--begin::id-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">

                                <input type="text" wire:model="post.lead_id" value="" name="lead_id"
                                    class="form-control  form-control-solid" placeholder="" disabled />
                                <label for="floatingInputDateTime " class="ps-10 required">Id</label>
                            </div>
                            <!--end::id-->
                            <!--begin::userName -->

                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">

                                <input type="text" wire:model="post.name" value="$post['name']"
                                    name="name" class="form-control  form-control-solid" placeholder="" disabled />
                                <label for="floatingInputDateTime "
                                    class="ps-10 required">{{ $post['name'] }}</label>
                            </div>

                            <!--end::userName -->
                        </div>
                        <div class="row">
                            <!--begin::Expiry Date-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                <input type="text" id="kt_datepicker_1" wire:model="post.expiryDate"
                                    value="{{ $post['expiryDate'] ?? '' }}" name="expiryDate"
                                    class="form-control  form-control-solid @error('post.expiryDate') is-invalid @enderror"
                                    id="floatingInputDate" placeholder="Date" required />
                                <label for="floatingInputDate " class="ps-10 required">Expiry Date</label>
                            </div>
                            <!--end::Expiry Date-->
                            <!--begin::taxAble-->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">

                                <input type="text" wire:model="post.remarks" value="remarks" name="remarks"
                                    class="form-control  form-control-solid" placeholder="remarks" />
                                <label for="floatingInputDateTime " class="ps-10">Remarks</label>
                            </div>

                            <!--end::taxAble-->
                        </div>
                        <div class="row">

                            <!--begin:: taxAble -->
                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                Tax Able
                                <input class="form-check-input me-3" wire:model="post.taxAble" name="taxAble"
                                    type="radio" value="{{ 1 }}" />Yes
                                <input class="form-check-input me-3" wire:model="post.taxAble" name="taxAble"
                                    type="radio" value="{{ 0 }}" />No
                            </div>
                            @error('post.taxAble')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end:: taxAble -->

                            <!--begin:: includingGst -->

                            <div class="col-lg-5 col-sm-12 form-floating mb-7 ms-10">
                                Includig Gst
                                <input class="form-check-input me-3" wire:model="post.includingGst" name="includingGst"
                                    type="radio" value="{{ 1 }}" />Yes
                                <input class="form-check-input me-3" wire:model="post.includingGst" name="includingGst"
                                    type="radio" value="{{ 0 }}" />No
                            </div>
                            @error('post.includingGst')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <!--end:: includingGst -->

                        </div>
                        <!--begin::company Name-->
                        <div class=" row row-cols-4 mb-7 ms-10">
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
                        <div class=" row row-cols-4 mb-7 d-lg-inline-flex ms-10">
                            <div class="col-12 fs-1 fw-bold">Account Manager </div>
                            @foreach ($accountMangerData as $accountManger_Data)
                                <div class="col-lg-3 col-sm-6 col-12 form-check p-3 form-check-custom ">
                                    <input class="form-check-input" wire:model="post.accountManager_id"
                                        name="accountManager_id" type="radio" value="{{ $accountManger_Data->id }}"
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
                        <div class="col-12 fs-1 fw-bold">Invoice Items</div>

                        <div>
                            <!-- User repeater -->
                            <div kt_docs_repeater_basic>
                                @foreach ($orderItems as $index => $orderItemsData)
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="form-label">Product</label>
                                                <select class="form-control mb-2 mb-md-0"
                                                    wire:model="orderItems.{{ $index }}.product_id"
                                                    placeholder="Enter name">
                                                    <option value="">Product</option>
                                                    @foreach ($productsData as $products_Data)
                                                        <option value="{{ $products_Data->id }}">
                                                            {{ $products_Data->name }} </option>
                                                        {{ $products_Data->name }}
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Period</label>
                                                <select class="form-control mb-2 mb-md-0"
                                                    wire:model="orderItems.{{ $index }}.period"
                                                    placeholder="Enter name">
                                                    <option></option>
                                                    <option value="1h">1 hr</option>
                                                    <option value="2h">2 hr</option>
                                                    <option value="3h">3 hr</option>
                                                    <option value="1d">1 Day</option>
                                                    <option value="3d">3 Days</option>
                                                    <option value="7d">7 Days</option>
                                                    <option value="15d">15 Days</option>
                                                    <option value="1m">1 Month</option>
                                                    <option value="3m">3 Month</option>
                                                    <option value="6m">6 Month</option>
                                                    <option value="9m">9 Month</option>
                                                    <option value="1y">1 Year</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Quantity</label>
                                                <input type="text" class="form-control mb-2 mb-md-0"
                                                    wire:model="orderItems.{{ $index }}.quantity"
                                                    placeholder="Enter number" />
                                            </div>
                                            <div class="col-md-4">
                                                <!-- Remove user button -->
                                                <a href="javascript:;"
                                                    wire:click.prevent="removeOrderItem({{ $index }})"
                                                    class="btn btn-sm btn-light-danger mt-3 mt-md-8">
                                                    <i class="ki-duotone ki-trash fs-5"></i>
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group mt-5">
                                    <a href="javascript:;" wire:click.prevent="addOrderItem()"
                                        class="btn btn-light-primary">
                                        <i class="ki-duotone ki-plus fs-3"></i>
                                        Add User
                                    </a>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="row text-end mb-7">
                                <div class="col">
                                    <button type="submit" wire:click="addInvoice();" class="btn btn-primary">Add
                                        </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@section('scripts')
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('kt_docs_repeater_basic').repeater({
                initEmpty: false,

                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
        });
    </script>
    <script>
       $("#kt_datepicker_1").flatpickr();
    </script>

@endsection

@section('title', '| Invoice Add')

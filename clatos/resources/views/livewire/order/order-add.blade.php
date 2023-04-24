@php
    //dd($details['lead']['name']);
@endphp

@section('css')
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
@endsection
<div>
    <!--begin::Form-->
    <form wire:submit.prevent="orderAddSubmit" id="kt_docs_formvalidation_text" class="form" action="#" autocomplete="off">
        <div class="row">
            <!--begin::Input group-->
                <div class="fv-row mb-10 col-6">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Lead</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Enter Lead" value="{{$details['lead']['name']}},{{$details['lead']['id']}}" readonly/>
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-10 col-6">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Remarks</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input wire:model="remark"  type="textarea" name="remark" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                    <!--end::Input-->
                </div>
            <!--end::Input group-->
        </div>
        <hr>
        <!--begin::Repeater-->
            <div id="kt_docs_repeater_advanced">
                <!--begin::Form group-->
                <div class="form-group">
                    <div data-repeater-list="kt_docs_repeater_advanced">
                        <div data-repeater-item>
                            <div class="form-group row mb-5">
                                <div class="col-md-4">
                                    <label class="form-label">Select Product:</label>
                                    <select class="form-select"  wire:model="productItem" name="productItem" aria-label="Select example">
                                        <option> Product</option>
                                        @foreach ($details['product'] as $item)
                                            <option value="{{ $item['id'] }},{{$item['name']}}"> {{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Select Period:</label>
                                    <select class="form-select" name="period" wire:model="period" data-placeholder="Select an period">
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
                                    <input wire:model="quantity" name="quantity" class="form-control" type="number" value="" />
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" type="button" wire:click.prevent="addOrderItem" class="btn btn-flex btn-sm btn-light-success mt-3 mt-md-9">Add Item
                                    </a>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form group-->                
            </div>
        <!--end::Repeater-->
        <div class="row text-end mb-7">
            <div class="col">
                <button class="btn btn-primary">Save Order</button>
            </div>
        </div>
    </form>
    <!--end::Form-->
    <div class="table-responsive">
        <h3>Added Item(s)</h3>
        <table class="table table-bordered">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800">
                    <th>Product</th>
                    <th>Period</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order_items as $key => $item)
                    <tr>
                        <td>{{ $item['product'] }}</td>
                        <td>{{ $item['period'] }}</td>
                        <td>{{$item['quantity']}}</td>
                        <td><button class="btn btn-sm btn-danger" wire:click.prevent="delOrderItem({{$key}})">Del</button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@section('scripts')
    <script>
        $('#kt_docs_repeater_advanced').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();

                // Re-init select2
                $(this).find('[data-kt-repeater="select2"]').select2();

                // Re-init flatpickr
                $(this).find('[data-kt-repeater="datepicke"]').flatpickr();

                // Re-init tagify
                new Tagify(this.querySelector('[data-kt-repeater="tagify"]'));
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            },

            ready: function(){
                // Init select2
                $('[data-kt-repeater="select2"]').select2();

                // Init flatpickr
                $('[data-kt-repeater="datepicke"]').flatpickr();

                // Init Tagify
                new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
            }
        });
    </script>
@endsection
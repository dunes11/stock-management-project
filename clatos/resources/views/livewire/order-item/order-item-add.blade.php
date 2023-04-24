@section('css')
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
@endsection
    <!--begin::Form-->
    <form id="kt_docs_formvalidation_text" class="form" action="#" autocomplete="off">
        <div class="row">
            <!--begin::Input group-->
                <div class="fv-row mb-10 col-6">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Lead</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="text" name="text_input" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-10 col-6">
                    <!--begin::Label-->
                    <label class="required fw-semibold fs-6 mb-2">Remarks</label>
                    <!--end::Label-->

                    <!--begin::Input-->
                    <input type="textarea" name="text_input" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="" />
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
                                    <select class="form-select" data-kt-repeater="select2" data-placeholder="Select an Product">
                                        <option></option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Select Peroid:</label>
                                    <select class="form-select" data-kt-repeater="select2" data-placeholder="Select an Peroid">
                                        <option></option>
                                        <option value="1hr">1 hr</option>
                                        <option value="1hr">2 hr</option>
                                        <option value="1hr">3 hr</option>
                                        <option value="1hr">1 Day</option>
                                        <option value="1hr">3 Days</option>
                                        <option value="1hr">7 Days</option>
                                        <option value="1hr">15 Days</option>
                                        <option value="1hr">1 Month</option>
                                        <option value="1hr">3 Month</option>
                                        <option value="1hr">6 Month</option>
                                        <option value="1hr">9 Month</option>
                                        <option value="1hr">1 Year</option>                                    
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Quantity</label>
                                    <input class="form-control" type="number" value="1"/>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:;" data-repeater-delete class="btn btn-flex btn-sm btn-light-danger mt-3 mt-md-9">
                                        <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i>
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Form group-->

                <!--begin::Form group-->
                <div class="form-group">
                    <a href="javascript:;" data-repeater-create class="btn btn-flex btn-light-primary">
                        <i class="ki-duotone ki-plus fs-3"></i>
                        Add
                    </a>
                </div>
                <!--end::Form group-->
            </div>
        <!--end::Repeater-->
    </form>
    <!--end::Form-->
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
                $(this).find('[data-kt-repeater="datepicker"]').flatpickr();

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
                $('[data-kt-repeater="datepicker"]').flatpickr();
                // Init Tagify
                new Tagify(document.querySelector('[data-kt-repeater="tagify"]'));
            }
        });
    </script>
@endsection
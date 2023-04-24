{{-- <!-- @if (Session::any()) --> --}}
<div class=" position-absolute mt-n20 end-50 z-index-3">
    @if (Session::has('success'))
    <div class="alert alert-dismissible alert-success d-flex flex-column flex-sm-row mb-10 me-15 mt-1 p-5 shadow">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z" />
                <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z" />
            </svg>
        </span>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 dark">Success</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>{{ Session::get('success') }}.</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-dark"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    @endif
    @if (session()->has('warning'))
    <div class="alert alert-dismissible alert-warning d-flex flex-column flex-sm-row mb-10 me-15 mt-1 p-5 ">
        <!--begin::Icon-->
        <span class="">
            <span class="material-icons-round fs-3tx">
                warning
            </span>
        </span>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 dark">Warning</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>{{ Session::get('warning') }}.</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-dark"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-dismissible alert-danger d-flex flex-column flex-sm-row mb-10 me-15 mt-1 p-5 ">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
            <span class="material-icons">
                error
            </span>
        </span>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 dark">Error</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>{{ Session::get('error') }}.</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-dark"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-dismissible alert-info d-flex flex-column flex-sm-row mb-10 me-15 mt-1 p-5 ">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-info me-4 mb-5 mb-sm-0">
            <span class="material-icons">
                comment
            </span>
        </span>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 dark">Message</h4>
            <!--end::Title-->
            <!--begin::Content-->
            <span>{{ Session::get('message') }}.</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-dark"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-dismissible alert-danger d-flex flex-column flex-sm-row mb-10 me-15 mt-1 p-5 ">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
            <span class="material-icons">
                error
            </span>
        </span>
        <!--end::Icon-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-dark pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 dark">Error</h4>
            <!--end::Title-->
            <!--begin::Content-->
            @foreach ($errors->all() as $error)
            <span>{{ $error }}</span>
            @endforeach
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-dark"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                </svg>
            </span>
        </button>
        <!--end::Close-->
    </div>
    @endif

</div>
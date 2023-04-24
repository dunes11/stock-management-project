<div class="toolbar py-3" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class=" container-fluid d-flex flex-stack flex-wrap">


        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-3">

            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-line fw-semibold fs-7 my-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-700 ">
                    <a href="/" class="text-gray-700 text-hover-primary">
                        <i class="ki-duotone ki-home-2 fs-2 mb-1 ">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </a>
                </li>
                <!--end::Item-->
                @yield('breadcrumb')


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Actions-->
        <div class=" py-3 py-md-1">
            <!--begin::Wrapper-->
            @yield('toolbox')
            <!--end::Wrapper-->

        </div>
        <!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Two+Tone" rel="stylesheet">


    <title>Clatos Crm @yield('title')</title>

    @livewireStyles
    @include('layouts/components/css')
    @yield('css')

</head>

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    @php
        $patharray = explode('.', Route::currentRouteName());
    @endphp
    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <!--begin::Header-->
            @include('layouts/components/header')
            <!--end::Header-->
            
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('layouts/components/sidebar')
                
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        @include('layouts/components/toolbar')
                        <!--end::Toolbar-->
                        <!--begin::Content-->
                        
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container">
                                
                                {{-- {{ dd($patharray )}} --}}
                                
                                @yield('content')
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                </div>
                <!--end:::Main-->
                <!--begin::Footer-->
                @include('layouts/components/footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    @livewireScripts

    @include('layouts/components/scripts')
    @stack('scripts')
    @yield('scripts')
</body>

</html>

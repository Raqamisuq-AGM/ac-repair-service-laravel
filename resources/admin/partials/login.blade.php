@php
    $systemLogo = App\Models\SystemImage::where('type', 'logo')->first();
    $systemFavicon = App\Models\SystemImage::where('type', 'favicon')->first();
@endphp
<!DOCTYPE html>

<html lang="en" class="light-style layout-compact layout-navbar-fixed layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-framework="laravel" data-template="vertical-menu-theme-default-light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="rcCFW4L2PC94SoUDGLm8PbO1j3tAMXx2J8uBLwXM">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset($systemFavicon->file) }}" />


    <!-- Include Styles -->
    <!-- $isFront is used to append the front layout styles only on the front layout otherwise the variable will be blank -->
    <!-- BEGIN: Theme CSS-->
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/fonts/flag-icons.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/css/rtl/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/css/rtl/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/css/demo.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet"
        href="{{ asset('/backend/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Vendor Styles -->
    <!-- Vendor -->
    <link rel="stylesheet"
        href="{{ asset('/backend/admin/assets/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />


    <!-- Page Styles -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('/backend/admin/assets/vendor/css/pages/page-auth.css') }}">

    <!-- Include Scripts for customizer, helper, analytics, config -->
    <!-- $isFront is used to append the front layout scriptsIncludes only on the front layout otherwise the variable will be blank -->
    <!-- laravel style -->
    <script src="{{ asset('/backend/admin/assets/vendor/js/helpers.js') }}"></script>
    <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script src="{{ asset('/backend/admin/assets/vendor/js/template-customizer.js') }}"></script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('/backend/admin/assets/js/config.js') }}"></script>

  @yield('style')

</head>

<body>

@yield('content')



  <!-- Include Scripts -->
  <!-- $isFront is used to append the front layout scripts only on the front layout otherwise the variable will be blank -->
  <!-- BEGIN: Vendor JS-->
<script src="{{ asset('/backend/admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('/backend/admin/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('/backend/admin/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('/backend/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/backend/admin/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('/backend/admin/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset('/backend/admin/assets/js/main.js') }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
<script src="{{ asset('/backend/admin/assets/js/pages-auth.js') }}"></script>
<!-- END: Page JS-->

</body>

</html>

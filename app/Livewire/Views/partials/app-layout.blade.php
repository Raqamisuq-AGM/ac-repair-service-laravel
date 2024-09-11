@php
$customCode = App\Models\CustomHeaderFooterCode::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    {{-- SEO --}}
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="raqamisuq">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:image" content="@yield('og_image')">
    <meta property="og:image:secure_url" content="@yield('og_image_url')">
    <meta property="og:image:alt" content="@yield('og_image')">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title')">
    <meta property="twitter:description" content="@yield('description')">
    <meta property="twitter:image" content="@yield('twitter_image')">
    <meta property="twitter:image:alt" content="@yield('twitter_image')">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('storage/uploads/img/favicon.png') }}" />
    <link href="{{ asset(theme_asset('css/bootstrap.min.css')) }}" rel="stylesheet" />
    <link href="{{ asset(theme_asset('css/style.css')) }}" rel="stylesheet" />
    <link href="{{ asset(theme_asset('css/responsive.css')) }}" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @yield('styles')
    {!! $customCode->header_code !!}
</head>

<body>
    <div class="page-wrapper">
        <livewire:layout.header />
        {{$slot}}
        <livewire:layout.footer />
    </div>

    {{-- Scripts --}}
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>
    <script src="{{ asset(theme_asset('js/jquery.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/popper.min.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/bootstrap.min.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/jquery.fancybox.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/jquery-ui.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/wow.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/appear.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/select2.min.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/swiper.min.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/owl.js')) }}"></script>
    <script src="{{ asset(theme_asset('js/script.js')) }}"></script>
    @livewireScripts
    @yield('scripts')
    {!! $customCode->footer_code !!}
</body>

</html>
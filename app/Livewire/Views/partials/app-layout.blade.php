@php
$customCode = App\Models\CustomHeaderFooterCode::first();
$systemShortInfo = App\Models\SystemInfo::first();
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

    <div class="whatsapp-wrapper"
        style="position: fixed;
        bottom: 75px;
        right: 20px;
        display: flex;
        align-items: center;
        z-index: 999;">

        <!-- Message with close icon -->
        <div class="whatsapp-message" id="whatsappMessage" style="
        position: relative;
        margin-right: 10px;
        background-color: #4caf50;
        color: white;
        padding: 8px 12px;
        border-radius: 25px;
        font-size: 14px;
        font-family: Arial, sans-serif;
        white-space: nowrap;">

            <!-- Close Icon (X) -->
            <span id="closeMessage" style="
            position: absolute;
            top: -5px;
            left: -10px;
            background-color: white;
            color: #4caf50;
            font-weight: bold;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;">
                &times;
            </span>

            Click here to WhatsApp
        </div>

        <!-- WhatsApp Icon with shadow -->
        <div class="whatsapp-icon" style="
        width: 45px;
        height: 45px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Shadow added here */
        border-radius: 50%; /* Make sure the icon remains round */">
            <a href="https://wa.me/{{ $systemShortInfo->whatsapp }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="" style="width: 50px; height: 50px;">
                    <g>
                        <path d="M256.064 0h-.128C114.784 0 0 114.816 0 256c0 56 18.048 107.904 48.736 150.048l-31.904 95.104 98.4-31.456C155.712 496.512 204 512 256.064 512 397.216 512 512 397.152 512 256S397.216 0 256.064 0z" style="" fill="#4caf50" data-original="#4caf50" class=""></path>
                        <path d="M405.024 361.504c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.616-127.456-112.576-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016.16 8.576.288 7.52.32 11.296.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744-3.776 4.352-7.36 7.68-11.136 12.352-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" style="" fill="#fafafa" data-original="#fafafa" class=""></path>
                    </g>
                </svg>
            </a>
        </div>
    </div>

    <script>
        // Hide the message when the close icon is clicked
        document.getElementById('closeMessage').onclick = function() {
            document.getElementById('whatsappMessage').style.display = 'none';
        };
    </script>



    <script>
        // Hide the message when the close icon is clicked
        document.getElementById('closeMessage').onclick = function() {
            document.getElementById('whatsappMessage').style.display = 'none';
        };
    </script>

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
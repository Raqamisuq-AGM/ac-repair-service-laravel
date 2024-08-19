<!DOCTYPE html>
<html lang="en">
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
    <meta property="og:title" content="@yield('tilte')">
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
    <link rel="icon" href="{{ asset('uploads/img/favicon.png') }}" />
    <link href="{{ asset(themeAsset('css/bootstrap.min.css')) }}" rel="stylesheet" />
    <link href="{{ asset(themeAsset('css/style.css')) }}" rel="stylesheet" />
    <link href="{{ asset(themeAsset('css/responsive.css')) }}" rel="stylesheet" />

    <style>
        .bottom-shape {
            background-image: url({{ asset('/uploads/img/bottom-shape.png') }}) !important
    </style>
    @yield('styles')
</head>

<body>
    <div class="page-wrapper">
        {{-- Navbar Start --}}
        @include(themeView('partials.header'))
        {{-- Navbar End --}}

        {{-- Navbar Start --}}
        @yield('content')
        {{-- Navbar End --}}

        {{-- Navbar Start --}}
        @include(themeView('partials.footer'))
        {{-- Navbar End --}}
    </div>

    {{-- Scripts --}}
    {{-- <script src="{{ asset(themeAsset('js/custom/main.js')) }}"></script> --}}
    <div class="scroll-to-top scroll-to-target" data-target="html">
        <span class="fa fa-angle-up"></span>
    </div>
    <script src="{{ asset(themeAsset('js/jquery.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/popper.min.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/bootstrap.min.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/jquery.fancybox.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/jquery-ui.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/wow.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/appear.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/select2.min.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/swiper.min.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/owl.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/script.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/jquery.validate.min.js')) }}"></script>
    <script src="{{ asset(themeAsset('js/jqueryform.min.js')) }}"></script>
    <script>
        (function($) {
            $("#contact_form").validate({
                submitHandler: function(form) {
                    var form_btn = $(form).find('button[type="submit"]');
                    var form_result_div = "#form-result";
                    $(form_result_div).remove();
                    form_btn.before(
                        '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>'
                    );
                    var form_btn_old_msg = form_btn.html();
                    form_btn.html(form_btn.prop("disabled", true).data("loading-text"));
                    $(form).ajaxSubmit({
                        dataType: "json",
                        success: function(data) {
                            if (data.status == "true") {
                                $(form).find(".form-control").val("");
                            }
                            form_btn.prop("disabled", false).html(form_btn_old_msg);
                            $(form_result_div).html(data.message).fadeIn("slow");
                            setTimeout(function() {
                                $(form_result_div).fadeOut("slow");
                            }, 6000);
                        },
                    });
                },
            });
        })(jQuery);
    </script>
    @yield('scripts')
</body>

</html>

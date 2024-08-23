@php
    $systemLogo = App\Models\SystemImage::where('type', 'logo')->first();
    $systemShortInfo = App\Models\SystemShortInfo::where('id', '1')->first();
@endphp
<header class="main-header header-style-two">
    <div class="header-lower">
        <div class="main-box">
            <div class="logo-box">
                <div class="logo" style="max-width: 165px;">
                    <a href="/"><img src="{{ asset($systemLogo->file) }}" alt title="Oitech" /></a>
                </div>
            </div>

            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li class="{{ request()->routeIs('home') ? 'current' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ request()->routeIs('service', 'service.details') ? 'current' : '' }}">
                            <a href="{{ route('service') }}">Services</a>
                        </li>
                        <li class="{{ request()->routeIs('team', 'team.details') ? 'current' : '' }}">
                            <a href="{{ route('team') }}">Team</a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('about') }}">About</a>
                        </li> --}}
                        <li class="{{ request()->routeIs('faq') ? 'current' : '' }}">
                            <a href="{{ route('faq') }}">Faq</a>
                        </li>
                        <li class="{{ request()->routeIs('blog', 'blog.details') ? 'current' : '' }}">
                            <a href="{{ route('blog') }}">Blogs</a>
                        </li>
                        <li class="{{ request()->routeIs('contact') ? 'current' : '' }}"><a
                                href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>

                <div class="outer-box">
                    <a href="tel:{{ $systemShortInfo->phone }}" class="info-btn">
                        <i class="icon fa fa-phone"></i>
                        <small>Call Anytime</small><br />
                        {{ $systemShortInfo->phone }}
                    </a>
                    <a href="{{ route('contact') }}" class="theme-btn btn-style-one"><span class="btn-title">get
                            solution</span></a>

                    <div class="mobile-nav-toggler">
                        <span class="icon lnr-icon-bars"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-menu">
        <div class="menu-backdrop"></div>

        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo">
                    <a href="index.html"><img src="{{ asset($systemLogo->file) }}" alt title /></a>
                </div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="navigation clearfix"></ul>
            <ul class="contact-list-one">
                <li>
                    <div class="contact-info-box">
                        <i class="icon lnr-icon-phone-handset"></i>
                        <span class="title">Call Now</span>
                        <a href="tel:{{ $systemShortInfo->phone }}">{{ $systemShortInfo->phone }}</a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        <span class="icon lnr-icon-envelope1"></span>
                        <span class="title">Send Email</span>
                        <a href="#"><span>{{$systemShortInfo->email}}</span></a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <div class="logo">
                    <a href="{{ route('home') }}" title><img src="{{ asset($systemLogo->file) }}" /></a>
                </div>

                <div class="nav-outer">
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix"></ul>
                        </div>
                    </nav>

                    <div class="mobile-nav-toggler">
                        <span class="icon lnr-icon-bars"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="main-header header-style-two">
    <div class="header-lower">
        <div class="main-box">
            <div class="logo-box">
                <div class="logo" style="max-width: 165px;">
                    <a href="{{route('index')}}" wire:navigate><img src="{{ asset('storage/'.$logo) }}" alt="" /></a>
                </div>
            </div>

            <div class="nav-outer">
                <nav class="nav main-menu">
                    <ul class="navigation">
                        <li class="{{ request()->routeIs('index') ? 'current' : '' }}">
                            <a href="{{ route('index') }}" wire:navigate>Home</a>
                        </li>
                        <li class="dropdown {{ request()->routeIs('service', 'service.details','service.sub.service.details') ? 'current' : '' }}">
                            <a href="{{ route('service') }}" wire:navigate>Services</a>
                            <ul>
                                @foreach($services as $service)
                                <li class="dropdown">
                                    <a href="{{ route('service.details', ['slug' => $service->slug]) }}" wire:navigate>{{ $service->title }}</a>
                                    @if($service->subServices->isNotEmpty())
                                    <ul>
                                        @foreach($service->subServices as $subService)
                                        <li>
                                            <a href="{{ route('service.sub.service.details', ['slug' => $service->slug,'subServiceSlug' => $subService->slug]) }}" wire:navigate>
                                                {{ $subService->title }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="{{ request()->routeIs('about') ? 'current' : '' }}">
                            <a href="{{ route('about') }}" wire:navigate>About Us</a>
                        </li>
                        <li class="{{ request()->routeIs('contact') ? 'current' : '' }}">
                            <a
                                href="{{ route('contact') }}" wire:navigate>
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="outer-box">
                    <a href="tel:{{ $systemShortInfo->phone }}" class="info-btn">
                        <i class="icon fa fa-phone"></i>
                        <small>Call Anytime</small><br />
                        {{ $systemShortInfo->phone }}
                    </a>
                    <a href="{{ route('contact') }}" wire:navigate class="theme-btn btn-style-one"><span class="btn-title">
                            Schedule Appointment
                        </span>
                    </a>

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
                    <a href="{{route('index')}}" wire:navigate><img src="{{ asset('storage/'.$logo) }}" alt title /></a>
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
                    <a href="{{ route('index') }}" wire:navigate title><img src="{{ asset('storage/'.$logo) }}" /></a>
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
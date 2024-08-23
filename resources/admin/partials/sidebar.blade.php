@php
    $systemLogo = App\Models\SystemImage::where('type', 'logo')->first();
    $systemFavicon = App\Models\SystemImage::where('type', 'favicon')->first();
@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset($systemLogo->file) }}" alt="" style="width: 70%;">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bold ms-2">Sneat</span> --}}
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        {{-- dashboard route --}}
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div class="text-truncate">Dashboard</div>
            </a>
        </li>

        {{-- category route --}}
        {{-- <li class="menu-item {{ request()->routeIs('category.all') ? 'active' : '' }}">
            <a href="{{ route('category.all') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-category'></i>
                <div class="text-truncate">Categories</div>
            </a>
        </li> --}}

        {{-- service route --}}
        <li
            class="menu-item {{ request()->routeIs('service.all', 'service.create', 'service.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-package'></i>
                <div class="text-truncate">Services</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('service.all') ? 'active' : '' }}">
                    <a href="{{ route('service.all') }}" class="menu-link">
                        <div>All</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('service.create') ? 'active' : '' }}">
                    <a href="{{ route('service.create') }}" class="menu-link">
                        <div>Create</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- team route --}}
        <li class="menu-item {{ request()->routeIs('team.all', 'team.create', 'team.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxl-microsoft-teams'></i>
                <div class="text-truncate">Teams</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('team.all') ? 'active' : '' }}">
                    <a href="{{ route('team.all') }}" class="menu-link">
                        <div>All</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('team.create') ? 'active' : '' }}">
                    <a href="{{ route('team.create') }}" class="menu-link">
                        <div>Create</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- faq route --}}
        <li class="menu-item {{ request()->routeIs('faq.all', 'faq.create', 'faq.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-question-mark'></i>
                <div class="text-truncate">Faqs</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('faq.all') ? 'active' : '' }}">
                    <a href="{{ route('faq.all') }}" class="menu-link">
                        <div>All</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('faq.create') ? 'active' : '' }}">
                    <a href="{{ route('faq.create') }}" class="menu-link">
                        <div>Create</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- blog route --}}
        <li class="menu-item {{ request()->routeIs('blog.all', 'blog.create', 'blog.edit') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bxl-blogger'></i>
                <div class="text-truncate">Blogs</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('blog.all') ? 'active' : '' }}">
                    <a href="{{ route('blog.all') }}" class="menu-link">
                        <div>All</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('blog.create') ? 'active' : '' }}">
                    <a href="{{ route('blog.create') }}" class="menu-link">
                        <div>Create</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- contact mail route --}}
        <li class="menu-item {{ request()->routeIs('contact_mail.all') ? 'active' : '' }}">
            <a href="{{ route('contact_mail.all') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-mail-send'></i>
                <div class="text-truncate">Contact Mails</div>
            </a>
        </li>

        {{-- traffic route --}}
        <li class="menu-item {{ request()->routeIs('traffics.all') ? 'active' : '' }}">
            <a href="{{ route('traffics.all') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-user'></i>
                <div class="text-truncate">Traffics</div>
            </a>
        </li>

        {{-- frontend route --}}
        {{-- <li class="menu-item {{ request()->routeIs('frontend.all') ? 'active' : '' }}">
            <a href="{{ route('frontend.all') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-collection'></i>
                <div class="text-truncate">Frontend</div>
            </a>
        </li> --}}

        {{-- settings route --}}
        <li
            class="menu-item {{ request()->routeIs('settings.clearCache', 'settings.generateSitemap', 'settings.custom.code', 'settings.company', 'settings.changeEmail', 'settings.changePassword') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon tf-icons bx bx-cog'></i>
                <div class="text-truncate">Settings</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('settings.custom.code') ? 'active' : '' }}">
                    <a href="{{ route('settings.custom.code') }}" class="menu-link">
                        <div>Custom Code</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.company') ? 'active' : '' }}">
                    <a href="{{ route('settings.company') }}" class="menu-link">
                        <div>About Company</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.changeEmail') ? 'active' : '' }}">
                    <a href="{{ route('settings.changeEmail') }}" class="menu-link">
                        <div>Change Email</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.changePassword') ? 'active' : '' }}">
                    <a href="{{ route('settings.changePassword') }}" class="menu-link">
                        <div>Change password</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.clearCache') ? 'active' : '' }}">
                    <a href="{{ route('settings.clearCache') }}" class="menu-link">
                        <div>Clear Cache</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.generateSitemap') ? 'active' : '' }}">
                    <a href="{{ route('settings.generateSitemap') }}" class="menu-link">
                        <div>Generate Sitemap</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- logout route --}}
        <li class="menu-item {{ request()->routeIs('logout') ? 'active' : '' }}">
            <a href="{{ route('logout') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-power-off'></i>
                <div class="text-truncate">Logout</div>
            </a>
        </li>
    </ul>
</aside>

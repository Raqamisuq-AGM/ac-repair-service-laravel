@php
    $unreadMials = App\Models\ContactUsMail::where('status', '0')->limit(5)->get();
    $mailCount = App\Models\ContactUsMail::where('status', '0')->count();
    use Carbon\Carbon;
@endphp

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <!--  Brand demo (display only for navbar-full and hide on below xl) -->

    <!-- ! Not required for layout-without-menu -->
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- Quick links  -->
            <li class="nav-item me-2 me-xl-0" title="Clear Cache">
                <a class="nav-link hide-arrow" href="{{ route('settings.clearCache') }}">
                    <i class='bx bx-brush bx-sm'></i>
                </a>
            </li>

            <li class="nav-item me-2 me-xl-0" title="Generate Sitemap">
                <a class="nav-link hide-arrow" href="{{ route('settings.generateSitemap') }}">
                    <i class='bx bx-sitemap bx-sm'></i>
                </a>
            </li>

            <li class="nav-item me-2 me-xl-0" title="Logout">
                <a class="nav-link hide-arrow" href="{{ route('logout') }}">
                    <i class='bx bx-power-off bx-sm'></i>
                </a>
            </li>
            <!-- Quick links -->

            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-mail-send bx-sm"></i>
                    @if ($mailCount > 0)
                        <span class="badge bg-danger rounded-pill badge-notifications">{{ $mailCount }}</span>
                    @endif

                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Unread Mails</h5>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">
                            @if ($mailCount > 0)
                                @foreach ($unreadMials as $unreadMial)
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <a href="{{ route('contact_mail.view', ['id' => $unreadMial->id]) }}">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $unreadMial->name }} send you a mail</h6>
                                                    <p class="mb-0">
                                                        {{ $unreadMial->subject }}
                                                    </p>
                                                    <small class="text-muted">
                                                        {{ Carbon::parse($unreadMial->created_at)->diffForHumans() }}
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <span
                                    style="text-align: center;
                                        margin-top: 5px; margin-bottom:10px">No
                                    unread mails</span>
                            @endif
                        </ul>
                    </li>
                    @if ($mailCount > 0)
                        <li class="dropdown-menu-footer border-top p-3">
                            <a href="{{ route('contact_mail.all') }}" class="btn btn-primary text-uppercase w-100"
                                style="color:white">
                                view all mails
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
            <!--/ Notification -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    {{-- <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..."
            aria-label="Search..." />
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
    </div> --}}
</nav>

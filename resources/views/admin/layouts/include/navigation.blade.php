<header class="pc-header">
    <div class="m-header">
        <a href="/" class="pc-link">
            <img src="{{ asset('css/admin/images/logo-dark.svg') }}" alt="" class="logo logo-lg" />
        </a>
        <div class="pc-h-item">
            <a href="#" class="pc-head-link head-link-secondary m-0" id="sidebar-hide">
                <i class="ti ti-menu-2"></i>
            </a>
        </div>
    </div>
    <div class="header-wrapper">
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <li class="pc-h-item header-mobile-collapse">
                    <a href="#" class="pc-head-link head-link-secondary ms-0" id="mobile-collapse">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item d-inline-flex d-md-none">
                    @yield('breadcrumb')
                </li>
                <li class="pc-h-item d-none d-md-inline-flex">
                    @yield('breadcrumb')
                </li>
            </ul>
        </div>
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item header-user-profile">
                    <a data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                        aria-expanded="false">
                        <h1><i class="ti ti-user"></i></h1>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header">
                            <h4>Good Morning,
                                <span class="small text-muted">
                                    {{-- @if (session('name'))
                                        {{ session('name') }}
                                    @endif --}}
                                </span>
                            </h4>
                            <p class="text-muted">
                                {{-- @if (session('role'))
                                    {{ session('role') }}
                                @endif --}}
                            </p>
                            <hr />
                            <div class="profile-notification-scroll position-relative"
                                style="max-height: calc(100vh - 280px)">
                                <a href="{{route('admin.AuthOut')}}" class="dropdown-item">
                                    <i class="ti ti-logout"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

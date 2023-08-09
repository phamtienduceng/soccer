<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="index.html" class="b-brand">
                <img src="{{ asset('css/admin/images/logo-dark.svg') }}" alt="" class="logo logo-lg" />
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Dashboard</label>
                    <i class="ti ti-dashboard"></i>
                </li>

                <li class="pc-item {{ request()->routeIs('admin.Dashboard') ? 'active' : '' }}">
                    <a href="{{route('admin.Dashboard')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                        <span class="pc-mtext">Dashboard</span></a>
                </li>

                <li class="pc-item pc-caption">
                    <label>Manager</label>
                    <i class="ti ti-apps"></i>
                </li>

                <li class="pc-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                    <a href="{{route('admin.user.index')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-users"></i></span>
                        <span class="pc-mtext">User</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>

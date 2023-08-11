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
                        <span class="pc-micon">
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Manager</label>
                    <i class="ti ti-apps"></i>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                    <a href="{{route('admin.user.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="pc-mtext">Users</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.match.index') ? 'active' : '' }}">
                    <a href="{{route('admin.match.index')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-golf"></i></span>
                        <span class="pc-mtext">Match</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.team.index') ? 'active' : '' }}">
                    <a href="{{route('admin.team.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-ball-football"></i>
                        </span>
                        <span class="pc-mtext">Teams</span>
                    </a>
                </li>

                
                <li class="pc-item">
                    <a href="{{route('admin.contact.index')}}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-ball-football"></i></span>
                        <span class="pc-mtext">Contact Us</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.player.index') ? 'active' : '' }}">
                    <a href="{{route('admin.player.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-ball-football"></i>
                        </span>
                        <span class="pc-mtext">Player</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.blog.index') ? 'active' : '' }}">
                    <a href="{{route('admin.blog.index')}}" class="pc-link">
                        <span class="pc-micon">
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="pc-mtext">Blogs</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Category Manager</label>
                    <i class="nav-icon fas fa-box"></i>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.category.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.list') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="far fa-circle nav-icon"></i>
                        </span>
                        <span class="pc-mtext">Category List</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.category.add') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.add') }}" class="pc-link">
                        <span class="pc-micon">
                            <i class="far fa-circle nav-icon"></i>
                        </span>
                        <span class="pc-mtext">Add Category</span>
                    </a>
                </li>
                                <li class="pc-item pc-caption">
                    <label>Product Manager</label>
                    <i class="nav-icon fas fa-shopping-bag"></i>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.product.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.list') }}" class="pc-link">
                        <span class="pc-micon"><i class="far fa-dot-circle nav-icon"></i></span>
                        <span class="pc-mtext">Product Information</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.product.gallery') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.gallery') }}" class="pc-link">
                        <span class="pc-micon"><i class="far fa-dot-circle nav-icon"></i></span>
                        <span class="pc-mtext">Product Image Gallery</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.product.add') ? 'active' : '' }}">
                    <a href="{{ route('admin.product.add') }}" class="pc-link">
                        <span class="pc-micon"><i class="far fa-circle nav-icon"></i></span>
                        <span class="pc-mtext">Add Product</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Order Manager</label>
                    <i class="nav-icon fa-solid fa-cart-shopping"></i>
                </li>
                <li class="pc-item {{ request()->routeIs('admin.order.list') ? 'active' : '' }}">
                    <a href="{{ route('admin.order.list') }}" class="pc-link">
                        <span class="pc-micon"><i class="far fa-circle nav-icon"></i></span>
                        <span class="pc-mtext">Order List</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
            </ul>
        </div>
    </div>
</nav>

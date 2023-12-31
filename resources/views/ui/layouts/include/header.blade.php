<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>


<header class="site-navbar py-4" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <a href="">
                    <img src="{{ asset('css/ui/images/logo.png') }}" alt="Logo">
                </a>
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="{{ request()->routeIs('ui.index') ? 'active' : '' }}">
                            <a href="{{ Route('ui.index') }}" class="nav-link">Home</a>
                        </li>
                        <li class="{{ request()->routeIs('ui.match.index') ? 'active' : '' }}"><a
                                href="{{ route('ui.match.index') }}" class="nav-link">Matches</a></li>
                        <li><a href="{{ Route('ui.players') }}" class="nav-link">Players</a></li>
                        <li><a href="{{ Route('ui.contact') }}" class="nav-link">Shop</a></li>
                        <li><a href="{{ Route('ui.blog.index') }}" class="nav-link">Blog</a></li>
                        <li><a href="{{ Route('ui.contact') }}" class="nav-link">Contact</a></li>
                        <li>
                            <a href="{{ Route('ui.cart.index') }}" class="nav-link">Cart</a>

                        </li>
                        <li>
                            <a href="{{ Route('ui.product.index') }}" class="nav-link">Product</a>
                        </li>
                        @if (session('user_id'))
                            <li>
                                <a href="{{route('ui.checkout.viewOrders')}}" class="nav-link">Order</a>
                            </li>
                        @endif
                        <li
                            class="{{ request()->routeIs('ui.AuthForm') || request()->routeIs('ui.AuthRegisterForm') ? 'active' : '' }}">
                            @if (!session('user_id'))
                                <a href="{{ route('ui.AuthForm') }}" class="nav-link">Log in</a>
                            @else
                                <a href="{{ route('ui.AuthOut') }}" class="nav-link">Log out</a>
                            @endif
                        </li>
                    </ul>

                </nav>

                <a href="#"
                    class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                        class="icon-menu h3 text-white"></span></a>
            </div>
        </div>
    </div>

</header>

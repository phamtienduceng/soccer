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
                        <li><a href="{{ Route('ui.index')}}" class="nav-link">Home</a></li>
                        <li><a href="{{ Route('ui.matches')}}" class="nav-link">Matches</a></li>
                        <li><a href="{{ Route('ui.players')}}" class="nav-link">Players</a></li>
                        <li><a href="{{ Route('ui.contact')}}" class="nav-link">Shop</a></li>
                        <li><a href="{{ Route('ui.blog')}}" class="nav-link">Blog</a></li>
                        <li><a href="{{ Route('ui.contact')}}" class="nav-link">Contact</a></li>
                        <li><a href="{{ Route('ui.AuthForm')}}" class="nav-link">User</a></li>
                    </ul>

                </nav>

                <a href="#"
                    class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                        class="icon-menu h3 text-white"></span></a>
            </div>
        </div>
    </div>

</header>

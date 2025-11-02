
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <a href="/" class="logo m-0 float-start d-flex"><img src="{{ asset('images/logo.png')}}" width="35" height="35" alt="">&nbsp;&nbsp;IPMS</a>

                <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                    <!-- Common Links for All Users -->
                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                    <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="/about">About</a></li>
                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="/contact">Contact</a></li>

                    @if(Auth::check())  
                        @if(Auth::user()->userroll == 'owner')
                            <li class="{{ Request::is('owner') ? 'active' : '' }}"><a href="/owner">Dashboard</a></li>
                        @elseif(Auth::user()->userroll == 'admin')
                            <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin">Admin Panel</a></li>
                        @elseif(Auth::user()->userroll == 'worker')
                            <li class="{{ Request::is('worker') ? 'active' : '' }}"><a href="/worker">Worker Panel</a></li>
                        @elseif(Auth::user()->userroll == 'customer')
                            <li class="{{ Request::is('customer') ? 'active' : '' }}"><a href="/customer">Dashboard</a></li>
                        @endif

                        <!-- Logout Button for Logged-in Users -->
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                        </li>
                    @else
                        <!-- Show Register and Login Only If User Is Not Logged In -->
                        <li class="{{ Request::is('register') ? 'active' : '' }}"><a href="{{ route('register') }}">Register</a></li>
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>

                <a href="#"
                    class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
                    data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
            </div>
        </div>
    </div>
</nav>
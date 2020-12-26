<nav class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow navbar-dark bg-dark">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('home') }}">
        <span>{{ config('app.name', 'Laravel') }}</span>
    </a>
    <button 
        class="navbar-toggler position-absolute d-md-none collapsed" 
        type="button" 
        data-toggle="collapse" 
        data-target="#sidebarMenu" 
        aria-controls="sidebarMenu" 
        aria-expanded="false" 
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">

        <li class="nav-item text-nowrap">
            <a class="nav-link" href="{{ route('home') }}">
                <div class="logout" id="logout-option">
                    <span class="align-middle" data-feather="log-out"></span>
                    <span class="align-middle">Sair</span>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>

    </ul>
    <!-- Right Side Of Navbar -->
    {{-- <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif
            
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul> --}}
</nav>
<nav class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow navbar-dark bg-dark">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ route('home') }}">
        <span>{{ config('app.name', 'Laravel') }}</span>
    </a>
    <ul class="navbar-nav px-4">
        <li class="nav-item text-nowrap">

            @if (Auth::check())
            <a class="nav-link" href="{{ route('home') }}">
                <div class="logout" id="logout-option">
                    <span class="align-middle" data-feather="home"></span>
                    <span class="align-middle">Dashboard</span>
                </div>
            </a>
            @else
            <a class="nav-link" href="{{ route('login') }}">
                <div class="logout" id="login-option">
                    <span class="align-middle" data-feather="log-in"></span>
                    <span class="align-middle">Entrar</span>
                </div>
            </a>
            @endif
        </li>
    </ul>
</nav>
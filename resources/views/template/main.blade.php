<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Four O'Clock Solutions">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('src/css/app.css') }}" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-multiselect.min.css') }}">

        <!-- Custom styles for this template -->
        <link href="{{ asset('src/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('src/css/dashboard.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('dist/js/jquery-3.5.1.slim.min.js') }}" defer></script>
        <script src="{{ asset('src/js/app.js') }}" defer></script>
        <script src="{{ asset('dist/js/bootstrap.bundle.js') }}" defer></script>
        <script src="{{ asset('dist/js/feather.min.js') }}" defer></script>
        {{-- <script src="{{ asset('dist/js/Chart.min.js') }}" defer></script> --}}
        <script src="{{ asset('dist/js/bootstrap-multiselect.min.js') }}" defer></script>
        <script src="{{ asset('src/js/dashboard.js') }}" defer></script>
        <script src="{{ asset('src/js/script.js') }}" defer></script>
    </head>
    <body>
        <div 
            class="loading-page d-flex justify-content-center align-items-center"
            id="loading">
            <div class="spinner-grow" role="status">
                <span class="sr-only">Loading...</span>
              </div>
        </div>

        @component('components.navbar.top')
        @endcomponent

        <div class="container-fluid">
            <div class="row">

                @component('components.navbar.left', compact('args'))
                @endcomponent

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="app">

                    @yield('content')

                    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

                </main>
            </div>
        </div>
    </body>
</html>

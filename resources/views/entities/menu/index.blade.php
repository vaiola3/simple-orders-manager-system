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

        @component('components.navbar.menu')
        @endcomponent

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="card-deck">
                            <div class="card">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                            <div class="card">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                            <div class="card">
                              <img src="..." class="card-img-top" alt="...">
                              <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

{{-- <a href="{{ route('login') }}">login</a> --}}
{{-- <a href="{{ route('register') }}">register</a> --}}
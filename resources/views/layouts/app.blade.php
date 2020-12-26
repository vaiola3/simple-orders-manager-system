<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('src/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('src/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('src/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{-- @component('components.navbar', ['current' => $current]) --}}
        @component('components.navbar')
        @endcomponent
        <main class="py-3">
            @yield('content')
        </main>
    </div>
</body>
</html>

<!doctype html>
<html lang="en">
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

        <!-- Custom styles for this template -->
        <link href="{{ asset('src/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('src/css/dashboard.css') }}" rel="stylesheet">
    </head>
    <body>

        @component('components.navbar.top')
        @endcomponent

        <div class="container-fluid">
            <div class="row">

                @component('components.navbar.left', [
                    'current_view' => $current_view ?? '',
                ])
                @endcomponent

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="app">

                    @yield('content')

                    {{-- <table class="table table-sm table-striped table-hover table-bordered">
                        <thead align="center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table> --}}

                    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

                    {{-- <h2>Section title</h2> --}}
                    {{-- <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                                <th>Header</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1,001</td>
                                <td>Lorem</td>
                                <td>ipsum</td>
                                <td>dolor</td>
                                <td>sit</td>
                            </tr>
                            <tr>
                                <td>1,002</td>
                                <td>amet</td>
                                <td>consectetur</td>
                                <td>adipiscing</td>
                                <td>elit</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>Integer</td>
                                <td>nec</td>
                                <td>odio</td>
                                <td>Praesent</td>
                            </tr>
                            <tr>
                                <td>1,003</td>
                                <td>libero</td>
                                <td>Sed</td>
                                <td>cursus</td>
                                <td>ante</td>
                            </tr>
                            <tr>
                                <td>1,004</td>
                                <td>dapibus</td>
                                <td>diam</td>
                                <td>Sed</td>
                                <td>nisi</td>
                            </tr>
                            <tr>
                                <td>1,005</td>
                                <td>Nulla</td>
                                <td>quis</td>
                                <td>sem</td>
                                <td>at</td>
                            </tr>
                            <tr>
                                <td>1,006</td>
                                <td>nibh</td>
                                <td>elementum</td>
                                <td>imperdiet</td>
                                <td>Duis</td>
                            </tr>
                            <tr>
                                <td>1,007</td>
                                <td>sagittis</td>
                                <td>ipsum</td>
                                <td>Praesent</td>
                                <td>mauris</td>
                            </tr>
                            <tr>
                                <td>1,008</td>
                                <td>Fusce</td>
                                <td>nec</td>
                                <td>tellus</td>
                                <td>sed</td>
                            </tr>
                            <tr>
                                <td>1,009</td>
                                <td>augue</td>
                                <td>semper</td>
                                <td>porta</td>
                                <td>Mauris</td>
                            </tr>
                            <tr>
                                <td>1,010</td>
                                <td>massa</td>
                                <td>Vestibulum</td>
                                <td>lacinia</td>
                                <td>arcu</td>
                            </tr>
                            <tr>
                                <td>1,011</td>
                                <td>eget</td>
                                <td>nulla</td>
                                <td>Class</td>
                                <td>aptent</td>
                            </tr>
                            <tr>
                                <td>1,012</td>
                                <td>taciti</td>
                                <td>sociosqu</td>
                                <td>ad</td>
                                <td>litora</td>
                            </tr>
                            <tr>
                                <td>1,013</td>
                                <td>torquent</td>
                                <td>per</td>
                                <td>conubia</td>
                                <td>nostra</td>
                            </tr>
                            <tr>
                                <td>1,014</td>
                                <td>per</td>
                                <td>inceptos</td>
                                <td>himenaeos</td>
                                <td>Curabitur</td>
                            </tr>
                            <tr>
                                <td>1,015</td>
                                <td>sodales</td>
                                <td>ligula</td>
                                <td>in</td>
                                <td>libero</td>
                            </tr>
                            </tbody>
                        </table>
                    </div> --}}
                </main>
            </div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('dist/js/jquery-3.5.1.slim.min.js') }}" defer></script>
        <script src="{{ asset('src/js/app.js') }}" defer></script>
        <script src="{{ asset('dist/js/bootstrap.bundle.js') }}" defer></script>
        <script src="{{ asset('dist/js/feather.min.js') }}" defer></script>
        <script src="{{ asset('dist/js/Chart.min.js') }}" defer></script>
        <script src="{{ asset('src/js/dashboard.js') }}" defer></script>
        <script src="{{ asset('src/js/script.js') }}" defer></script>
    </body>
</html>

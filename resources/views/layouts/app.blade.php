<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Timeline-ZAI-P1') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
{{--    <script src="resources/js/app.js"></script>--}}
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}


    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-core.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.11.0/js/anychart-timeline.min.js"></script>

    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-timeline.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-data-adapter.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
    <style type="text/css">

        html,
        body,
        #container {
            width: 100%;
            height: 600px;
            margin: 0;
            padding: 0;
        }

        .anychart-tooltip {
            width: 400px;
            background: white;
            color: black;
            box-shadow: 5px 5px 18px #333;
        }

        .anychart-tooltip h5 {
            text-align: center;
            margin: 5px 0;
        }

        .anychart-tooltip img {
            display: block;
            margin: 0 auto;
            max-height: 100%;
        }

    </style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                {{ config('app.name', 'Timeline-ZAI-P1') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/types">{{ __('Typy') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/events">{{ __('Zdarzenia') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/processes">{{ __('Procesy') }}</a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if ('/login')
                            <li class="nav-item">
                                <a class="nav-link" href="/login">{{ __('Zaloguj się') }}</a>
                            </li>
                        @endif

                        @if ('/register')
                            <li class="nav-item">
                                <a class="nav-link" href="/register">{{ __('Zarejestruj się') }}</a>
                            </li>
                        @endif
                    @else
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink"
                                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->username }}
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="/logout"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Wyloguj się') }}
                                            </a>
                                        </li>
                                        <form id="logout-form" action="/logout" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <li>
                                            <a class="dropdown-item" href="/profile"
                                               onclick="event.preventDefault();
                                                     document.getElementById('change-data-form').submit();">
                                                {{ __('Zmień dane konta') }}
                                            </a>
                                        </li>
                                        <form id="change-data-form" action="/profile" method="GET" class="d-none">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    @yield('main')
</div>
</body>
</html>

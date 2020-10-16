<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('/')}}admin/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('/')}}admin/css/app-dark.css" id="darkTheme">
</head>
<body class="dark ">
<div class="wrapper vh-100">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Islamic Book Bd
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <main class="py-0">
        @yield('content')
    </main>
</div>
    <script src="{{asset('/')}}admin/js/jquery.min.js"></script>
    <script src="{{asset('/')}}admin/js/popper.min.js"></script>
    <script src="{{asset('/')}}admin/js/moment.min.js"></script>
    <script src="{{asset('/')}}admin/js/bootstrap.min.js"></script>
    <script src="{{asset('/')}}admin/js/simplebar.min.js"></script>
    <script src='{{asset('/')}}admin/js/daterangepicker.js'></script>
    <script src='{{asset('/')}}admin/js/jquery.stickOnScroll.js'></script>
    <script src="{{asset('/')}}admin/js/tinycolor-min.js"></script>
    <script src="{{asset('/')}}admin/js/config.js"></script>
    <script src="{{asset('/')}}admin/js/apps.js"></script>
</body>
</html>


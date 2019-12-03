<?php
    use App\Profile;
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sidebar.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/e8767330e3.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/darkmode.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                                    @hasrole('Admin')
                                    <a class="dropdown-item" href="{{ route('index') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('index-form').submit();">
                                        {{ __('All Profiles') }}
                                    </a>
                                    <form id="index-form" action="{{ route('index') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    @endhasrole
                                    <a class="dropdown-item" href="{{ route('home') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('home-form').submit();">
                                        {{ __('Home') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('profiles/'.Auth::id()) }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('show-form').submit();">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('edit') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('edit-form').submit();">
                                        {{ __('Edit Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="home-form" action="{{ route('home') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="show-form" action="{{ url('profiles/'.Auth::id()) }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="edit-form" action="{{ route('edit') }}" method="EDIT" style="display: none;">
                                        @csrf
                                    </form>
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

        @if (Auth::check())
        <?php
            $id = Auth::user()->id;
            $profile = Profile::where('id', $id)->first();
        ?>
        <div class="page-wrapper chiller-theme">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">La Réponse D</a>
                    <div id="close-sidebar">
                    <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                    <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                        alt="User picture">
                    </div>
                    <div class="user-info">
                    <span class="user-name">
                        <span class="firstName">{{ $profile->firstName }}</span>
                        <span class="lastName">{{ $profile->lastName }}</span>
                    </span>
                    <span class="user-role"></span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Online</span>
                    </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                    <div class="input-group">
                        <input type="text" class="form-control search-menu" placeholder="Search...">
                        <div class="input-group-append">
                        <span class="input-group-text">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                    <li class="header-menu">
                        <span>General</span>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                        <span class="badge badge-pill badge-warning">New</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                            <a href="#">Dashboard 1
                                <span class="badge badge-pill badge-success">Pro</span>
                            </a>
                            </li>
                            <li>
                            <a href="#">Dashboard 2</a>
                            </li>
                            <li>
                            <a href="#">Dashboard 3</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fa fa-shopping-cart"></i>
                        <span>E-commerce</span>
                        <span class="badge badge-pill badge-danger">3</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                            <a href="#">Products

                            </a>
                            </li>
                            <li>
                            <a href="#">Orders</a>
                            </li>
                            <li>
                            <a href="#">Credit cart</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="far fa-gem"></i>
                        <span>Components</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                            <a href="#">General</a>
                            </li>
                            <li>
                            <a href="#">Panels</a>
                            </li>
                            <li>
                            <a href="#">Tables</a>
                            </li>
                            <li>
                            <a href="#">Icons</a>
                            </li>
                            <li>
                            <a href="#">Forms</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fa fa-chart-line"></i>
                        <span>Charts</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                            <a href="#">Pie chart</a>
                            </li>
                            <li>
                            <a href="#">Line chart</a>
                            </li>
                            <li>
                            <a href="#">Bar chart</a>
                            </li>
                            <li>
                            <a href="#">Histogram</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fa fa-globe"></i>
                        <span>Maps</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                            <a href="#">Google maps</a>
                            </li>
                            <li>
                            <a href="#">Open street map</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="header-menu">
                        <span>Extra</span>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Documentation</span>
                        <span class="badge badge-pill badge-primary">Beta</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-calendar"></i>
                        <span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fa fa-folder"></i>
                        <span>Examples</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        <i class="fas fa-moon"></i>
                        <label class="switch">
                            <input id="dark-mode-toggle" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        </a>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
                </div>
                <!-- sidebar-content  -->
                <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
                </div>
            </nav>
            <!-- sidebar-wrapper  -->
            <main class="container py-4">
                @yield('content')
            </main>
            <!-- page-content" -->
        </div>
            <!-- page-wrapper -->
        @else
            <main class="container py-4">
                @yield('content')
            </main>
        @endif
    </div>
    </body>
</html>

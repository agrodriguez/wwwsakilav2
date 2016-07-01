<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sakila V2</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
   <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Sakila V2
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="/contact">     <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Contact</a></li>
                    <li><a href="/about">       <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About</a></li>
                    <li><a href="/rentals">     <span class="glyphicon glyphicon-film" aria-hidden="true"></span> {{ trans('rental.rentals') }}</a></li>
                    <li><a href="/films">       <span class="glyphicon glyphicon-film" aria-hidden="true"></span> {{ trans('film.films') }}</a></li>
                    <li><a href="/customers">   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ trans('customer.customers') }}</a></li>
                    <li><a href="/staffs">      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ trans('staff.staffs') }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Database<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/actors">{{ trans('actor.actors') }}</a></li>
                            <li><a href="/cities">{{ trans('city.cities') }}</a></li>
                            <li><a href="/countries">{{ trans('country.countries') }}</a></li>
                            <li><a href="/stores">{{ trans('store.stores') }}</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="/categories">{{ trans('category.categories') }}</a></li>
                            <li><a href="/languages">{{ trans('language.languages') }}</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} : {{ Auth::user()->getStoreName() }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
     <script src="{{ elixir('js/all.js') }}" rel="stylesheet"></script>
     @yield('footer')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

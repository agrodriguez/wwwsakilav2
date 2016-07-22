<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sakila V2 - @yield('title')</title>

    {{-- 
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> 
    --}}

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
                <a class="navbar-brand" href="{{ url('/'.App::getLocale().'/') }}">
                    Sakila V2
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/'.App::getLocale().'/home') }}">{{ trans('menu.home') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/contact">     <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> {{ trans('menu.contact') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/about">       <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> {{ trans('menu.about') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/rentals">     <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> {{ trans('rental.rentals') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/films">       <span class="glyphicon glyphicon-film" aria-hidden="true"></span> {{ trans('film.films') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/customers">   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ trans('customer.customers') }}</a></li>
                    <li><a href="/{{ App::getLocale() }}/staffs">      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ trans('staff.staffs') }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('menu.database') }}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header">Sakila V2</li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/{{ App::getLocale() }}/countries">{{ trans('country.countries') }}</a></li>
                            <li><a href="/{{ App::getLocale() }}/cities">{{ trans('city.cities') }}</a></li>
                            <li><a href="/{{ App::getLocale() }}/categories">{{ trans('category.categories') }}</a></li>
                            <li><a href="/{{ App::getLocale() }}/languages">{{ trans('language.languages') }}</a></li>
                            <li><a href="/{{ App::getLocale() }}/actors">{{ trans('actor.actors') }}</a></li>
                            <li><a href="/{{ App::getLocale() }}/stores">{{ trans('store.stores') }}</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/'.App::getLocale().'/login') }}">Login</a></li>
                        <li><a href="{{ url('/'.App::getLocale().'/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} : {{ Auth::user()->getStoreName() }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/'.App::getLocale().'/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="{{ trans('menu.set_locale') }}" alt="{{ trans('menu.set_locale') }}">
                            <i class="glyphicon glyphicon-flag"></i>
                               <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>                                    
                                    <a href="{{ url('/es') }}" title="{{ trans('menu.es_set_locale') }}" alt="{{ trans('menu.es_set_locale') }}">
                                    @if( App::getLocale()=='es')
                                        <i class="glyphicon glyphicon-ok pull-right"></i>
                                    @endif
                                        {{  Config::get('app.locales')['es'] }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/en') }}" title="{{ trans('menu.en_set_locale') }}" alt="{{ trans('menu.en_set_locale') }}">
                                    @if( App::getLocale()=='en')
                                        <i class="glyphicon glyphicon-ok pull-right"></i>
                                    @endif
                                        {{  Config::get('app.locales')['en'] }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')

    <!-- JavaScripts -->
     <script src="{{ elixir('js/all.js') }}" rel="stylesheet"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

     @stack('scripts')
     
     @yield('footer')
</body>
</html>

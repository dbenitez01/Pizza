<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="#">Menu</a></li>
                        <li><a class="nav-link" href="{{ route('orders.create') }}">Order</a></li>
                        <li><a class="nav-link" href="#">Contact</a></li>
                        @auth
                          @if (Auth::user()->is_admin)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Admin <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('appetizers.index') }}">Appetizers</a>
                                    <a class="dropdown-item" href="{{ route('entrees.index') }}">Entrees</a>
                                    <a class="dropdown-item" href="{{ route('drinks.index') }}">Drinks</a>
                                    <a class="dropdown-item" href="{{ route('desserts.index') }}">Desserts</a>
                                    <a class="dropdown-item" href="{{ route('toppings.index') }}">Toppings</a>
                                    <a class="dropdown-item" href="{{ route('pizzas.index') }}">Pizzas</a>
                            </div>
                          @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                            <li class="nav-item dropdown"><a id="cartDropDown" href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-shopping-cart"></i>
                                  @if (isset($cart))
                                    <cart-items number="{{ count($cart) }}"></cart-items>
                                  @endif
                               </a>

                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('cart.index') }}" class="dropdown-item">View Cart</a>

                              </div>

                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


            @yield('content')

            <div class="container">
              <hr class="featurette-divider">
              <!-- FOOTER -->
              <footer class="container">
                <p class="float-right"><a href="#">Back to top</a></p>
                <p>&copy; 2018 One Stop Pizza Shop, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
              </footer>
            </div>

    </div>
</body>
</html>

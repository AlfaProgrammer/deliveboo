<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {{-- script --}}
    <script src="{{ asset('js/admin.js') }}"></script>
    <title></title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm position-fixed w-100 navbar">
            <div class="container d-flex flex-row">
                <span class="img-logo-wrapper">
                    <img class="logo" src="{{ asset('/images/deliveroo.png') }}" alt="">
                </span>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Home') }}
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
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main id="charts">

            <div id="loader-wrap">
                <div class="container-loader">
                    <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
                </div>
            </div>

            <div id="charts-wrapper" class="container active">
                <h1 class="title text-center mb-5">Statische</h1>

                <nav class="mb-4">
                    <a href="{{ route('admin.home') }}"
                    class="btn btn-warning">
                        Torna alla Dashboard
                    </a>
                </nav>

                <div class="position-relative mb-5">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="position-relative mb-5">
                    <canvas id="pieChart"></canvas>
                </div>
            </div>

        </main>

    <script src="{{ asset('js/chart.js') }}"></script>
</body>
</html>
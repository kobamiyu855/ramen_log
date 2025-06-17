<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--タイトルとファビコン-->
    <title>{{ config('app.name','Laravel') }}</title>
    <link rel="icon" href="{{ asset('ramen.svg') }}" type="image/svg+xml">  
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                 <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
                    <a href="{{ route('ramens.index') }}"><img src="{{ asset('storage/appimages/logo.png') }}" alt="Ramen.Log" height="50" class="me-2" title="ホーム"></a>
                    @auth
                        <ul class="navbar-nav me-auto">
                         <li><a class="nav-link" href="{{ route('ramens.create') }}" title="登録"><i class="bi bi-plus-lg" title="登録"style="font-size: 1.5rem;"></i></a></li>
                         <li><a class="nav-link" href="{{ route('ramens.showmap') }}"> <i class="bi bi-map" title="地図"style="font-size: 1.5rem;"></i></a></li>
                         <li><a class="nav-link" href="{{ route('ramens.mylist') }}" title="一覧"><i class="bi bi-list-ul" title="マイリスト"style="font-size: 1.5rem;"></i></a></li>
                         <li><a class="nav-link" href="{{ route('ramens.recomend') }}"> <i class="bi bi-suit-heart-fill" title="お気に入り"style="font-size: 1.5rem;"></i></a></li>
                        </ul>
                    @endauth
                    
 
        <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @auth
                        <form class="mx-auto my-1 d-flex" action="{{ route('ramens.index') }}" method="GET">
                        <input class="form-control form-control-sm" type="search" name="keyword" placeholder="ラーメンを検索" aria-label="Search">
                        <button class="btn btn-sm" type="submit"><i class="bi bi-search"></i></button>  
                        </form>
                        @endauth
        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                       <li><a href=""><i class="bi bi-person-lock"style="font-size: 1.5rem;" title="管理用"></i></a></li>
                    </ul>
                    
                </div>
            </div>
        </nav>
 
<main class="py-4">
            @yield('content')
</main>
    </div>
</body>
</html>
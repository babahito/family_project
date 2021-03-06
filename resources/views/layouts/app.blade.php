<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token(vueにも必要) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <title>Family NOTE</title>


    <!--★★ fontawsam ★★-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- css -->

    <link href="{{asset('/assets/css/normalize.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/top.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">

    <!-- ファビコン -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

</head>
<body style="background-color:#fff;">
    <div id="app">
        <div class="content">
            <!-- ヘッダー -->

            <header style="background-color:#f8fafc;">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin:0 auto;">

                    <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"></li>
                    </ul>
                    <span class="navbar-text">
                    <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --> 
                        @guest
                            <li>
                                <a class="nav-link" href="{{ route('login') }}"><button type="button" class="btn btn-secondary">{{ __('Login') }}</button></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-secondary">{{ __('Register') }}</button></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fas fa-user-circle"></i>{{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <!-- ログアウト -->
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
                    </span>
                </div>
            </nav>
            </header>

            <!--本文  -->
            @yield('content')
       </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/canva.js') }}"></script>


</body>
</html>

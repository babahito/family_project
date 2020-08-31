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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- css -->
    <link href="{{asset('/assets/css/top.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/normalize.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">

</head>
<body>
    <div id="app">
        <div class="header">
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li>
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
                                    <i class="fas fa-user-circle"></i>{{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!-- マイページ -->
                                    <a class="nav-link" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">
                                        <i class="fas fa-user-circle"></i>マイページ
                                    </a>
                                    <!-- family NOTE -->
                                    <a class="nav-link" href="{{-- route('post.create') --}}">
                                        <i class="fas fa-pen mr-1"></i>投稿する</a>
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
                </div>
            

        </div>
        <!--メイン部分 -->
    
            @yield('content')
        <!-- footer -->
            @include('footer')

       
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" ></script> -->
                        <!-- ★★vue読み込み用★★
                         
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   -->
</body>
</html>

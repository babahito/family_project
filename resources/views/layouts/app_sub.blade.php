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
    <link href="{{asset('/assets/css/top.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/normalize.css')}}" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">


    <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
     <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">

            <!-- ファビコン -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">


</head>
<body>
    <div id="app">
        <div class="content">
            <!-- ヘッダー -->
            <header>
            <!-- <nav class=" "> -->

                <div class="head_main">
                    <div>
                        <a href="{{ url('post') }}">
                            <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo">  
                        </a>
                    </div>
                    <div>
                <!-- <div class="collapse navbar-collapse" id="navbarText"> -->
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
                                    



                                    <!-- <ul class="navi-list">
            <a href="/kazoku"><li>
                    <i class="fas fa-smile-wink"></i><br>Family
                </li></a>
                <a href="/user"><li>
                    <i class="fas fa-users icon_gray"></i><br>Member
                </li></a>
                <a href="/post"><li>
                    <i class="fas fa-book-reader icon_gray"></i><br>MY NOTE
                </li></a>
                <a href="/users/{{Auth::user()->name}}/likes"><li>
                    <i class="fab fa-gratipay  icon_gray"></i><br>Favorite
                </li></a>
            </ul> -->




                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <!-- 退会 -->
                                        <a class="dropdown-item" href="{{ route('deactive') }}">
                                            {{ __('退会処理') }}
                                        </a>
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
                    </span>
                </div>
            </nav>
            </header>





                <!-- <div class="navigation"> -->
                <div class="navi">
                    @include('footer')
                </div>
<!-- </div> -->
            <!-- <メイン> -->
            
                
                    @yield('content')
                
            <!-- navi -->


       </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/canva.js') }}"></script>
    <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
         <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>

</body>
</html>

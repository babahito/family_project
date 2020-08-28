<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Family NOTE　</title>

<script src="/js/jquery.min.js"></script>

<!-- css -->
    <link href="{{asset('/assets/css/top.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/normalize.css')}}" rel="stylesheet">

<!-- Fonts -->
    <link href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">
</head>
<body>
        

    <!-- header -->
        <div class="header">
            <ul>
                <li>TOP</li>
                <li>CONCEPT</li>
                <li><img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo"></li>
                <li>PRODUCT</li>
                <li>LOGIN</li>
            </ul>
        </div>
    <!-- main_img -->
        <div class="main_img">
            
            <div>
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">ログイン</a>
            <a href="{{ route('register') }}">新規登録</a>
            @endauth
        </div>
        @endif
    </div>
        </div>
    <div class="concept">
    </div>
    
</body>
</html>
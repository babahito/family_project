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

    <!-- ファビコン -->
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
    <style>
        .head{
            background:#aaa;
            width:100%;
        }
        main{
            width:80%;
            margin:0 auto;
        }
        .comment{
            border:1px solid #aaa;
            padding:10px;
        }
            .pink_btn{
                background:#EEB0D2;
                color:#fff;
                border:1px solid #fff;
                padding:10px 0;
                width:100%;
                float:right;
                color:#fff;
                text-align: center;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.3);
                transition: color 1s, background 1s;
                margin-bottom:10px;
            }
            .pink_btn:hover{
                background:#EB8ABE;
                box-shadow: 0 0 2px rgba(0,0,0,0.2); 
            }
    </style>
</head>
<body>
    <div class="head">
        <img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo">
    </div>

    <main>
    @csrf
        <h3>{{$send_name}}へ</h3>
        <div class="comment">
            <h4>メッセージ</h4>
            {{ $text }}
        </div>

        <a href="{{ $urls['hi'] }}"><button class="pink_btn">参加する</button></a>
        {{ $urls['hi'] }}
        <!-- <a href="{{-- $urls['bye'] --}}"><button class="gray_btn">断る</button></a>  -->
    </main> 
</body>
</html>


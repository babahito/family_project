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
            <ul class="sub980">

                <li>CONCEPT</li>
                <li>PRODUCT</li>
                <li><img class="logo" src="{{ asset('/assets/images/logo.png') }}" alt="logo"></li>
                <li>
                    <a href="{{ route('register') }}" class="sign_btn">Sing In</a>
                </li>
                <li>   
                    <a href="{{ route('login') }}" class="login_btn">Log In</a>
                </li>
            </ul>
        </div>
    <!-- main_img -->
        <div class="main_img">
            <!-- 未来ボックス -->
            <!-- <div class="mirai_box">
                <img class="logo" src="{{ asset('/assets/images/mira.png') }}" alt="logo">
            </div>   -->
            <!-- ログイン -->
            <!-- <div class="log_box">
                    <a href="{{ route('register') }}" class="sign_btn">Sing In</a><br>
                    <a href="{{ route('login') }}" class="login_btn">Log In</a>
            </div> -->
        </div>
        
    <div class="concept sub980">

        <h2>CONCEPT</h2>
        <div class="concept_title"> 
            恥ずかしくていつも言えない。<br>けど、大切な家族。<br>みらいの家族にメッセージを送って、ちょっと幸せにしたい
        </div>
        <div class="note_box">
            <div class="note_sub">
                <div class="note_sub_img"><img class="logo" src="{{ asset('/assets/images/concept_01.png') }}" alt="FamilyNote1"></div>
                <div class="note_sub_title">ママから知花へ</div>
                <div class="note_sub_day">2020.10.20</div>
            </div>
            <div class="note_sub">
                <div class="note_sub_img"><img class="logo" src="{{ asset('/assets/images/concept_02.png') }}" alt="FamilyNote2"></div>
                <div class="note_sub_title">パパから隆太へ</div>
                <div class="note_sub_day">2020.10.20</div>
            </div>
            <div class="note_sub">
                <div class="note_sub_img"><img class="logo" src="{{ asset('/assets/images/concept_03.png') }}" alt="FamilyNote3"></div>
                <div class="note_sub_title">知花からおじいちゃんへ</div>
                <div class="note_sub_day">2020.10.20</div>
            </div>

        </div>
        <div class="logo_mini">
            <img class="logo" src="{{ asset('/assets/images/logo_mini.png') }}" alt="logo">
        </div>
    </div>


    <div class="concept sub980">

        <h2>HOW TO USE</h2>
    </div>



<!-- ななめ -->
    <section class="contents">
    <div class="contents_inner">
      testest
    </div>
    </section>

        <!-- 元のログイン認証 -->
        <!-- <div> -->
        <!-- @if (Route::has('login')) -->
        <!-- <div class="top-right links"> -->
            <!-- @auth -->
            <!-- <a href="{{-- url('/home') --}}">Home</a> -->
            <!-- @else -->
            <!-- <a href="{{-- route('login') --}}">ログイン</a> -->
            <!-- <a href="{{-- route('register') --}}">新規登録</a> -->
            <!-- @endauth -->
        <!-- </div> -->
        <!-- @endif -->


</body>
</html>
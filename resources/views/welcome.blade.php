@extends("layouts.app")
        @section("content")
            <div class="container">


        <div class="main_img">
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


        @endsection
    
@extends("layouts.app")

@section('content')
<main>
    <div class="main_user">
        ご利用ありがとうございます<br>
        つづきまして、ユーザー詳細の設定をお願いします。
        <div style="margin-top:20px;">
        <butto class="pink_btn mt-5">
            <a href="{{ action('UserDetailsController@create') }}">ユーザー詳細画面</a>
        </button>
        </div>
    </div>
</main>
@endsection

@extends("layouts.app")

@section('content')
<main style="margin-top:50px;">
    ご利用ありがとうございます<br>
    つづきまして、ユーザー詳細の設定をお願いします。
    <a href="{{ action('UserDetailsController@create') }}">new RINNKU</a>
    <a href="/user_detail">ユーザー詳細画面</a>


</main>
@endsection

@extends("layouts.app")

@section('content')
<main style="margin-top:50px;">
    ご利用ありがとうございます<br>
    つづきまして、ユーザー詳細の設定をお願いします。

    <a href="/user_detail">ユーザー詳細画面</a>

    <br><br>
    登録お済の方は、こちらへ
    <a href="{{ route('users.followings', ['name' => Auth::user()->name]) }}" >TOP画面</a>

</main>
@endsection

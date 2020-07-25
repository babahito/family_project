@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                <li><a href="{{url('/year_note')}}">Family NOTE</a></li>
                <li><a href="{{url('/note')}}">送る</a></li>
                <li><a href="{{url('/send')}}">送信履歴</a></li>
                <li><a href="{{url('/recieve')}}">受信履歴</a></li>
                <li><a href="{{url('/favorite')}}">お気に入り</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection

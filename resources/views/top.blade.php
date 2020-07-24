@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul>
                <li>Family Note</li>
                <li><a href="{{url('/note')}}">送る</a></li>
                <li>送った履歴</li>
                <li>受け取り</li>
                <li>お気に入りメッセージ</li>
                <li>保留中メッセージ</li>
            </ul>
        </div>
    </div>
</div>
@endsection

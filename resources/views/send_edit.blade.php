@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>送編集）</h2>
            <form action="{{ url('send/update') }}" method="POST">
                <input type="text" name="title" value="{{$note->title}}">
                <input type="text" name="body" value="{{$note->body}}">
                <input type="file" name="photo" value="{{$note->photo}}">
                
                <input type="datetime-local" name="toukou_time" value="{{$note->toukou_time}}">
                <!-- id 値を送信 -->
                <input type="submit">
                <input type="hidden" name="id" value="{{$note->id}}" />
                <!-- CSRF -->
                {{ csrf_field() }} 
            </form>
        </div>
    </div>
</div>
@endsection

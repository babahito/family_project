@extends("layouts.app")
        @section("content")
        <h2>フォロー</h2>
        @foreach($followings as $person)
      <p>{{$person->name}}</p>
    @endforeach

        @endsection
    
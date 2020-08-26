@extends("layouts.app")
        @section("content")
        <h2>フォロワー</h2>
        @foreach($followers as $person)
        
      <p>{{$person->name}}</p>
    @endforeach

        @endsection
    
@extends("layouts.app")
        @section("content")
        <h2>フォロー</h2>
        @foreach($followings as $person)
        <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
      <p>{{$person->name}}</p>
    @endforeach

        @endsection
    
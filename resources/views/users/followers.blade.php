@extends("layouts.app")
        @section("content")
        <h2>フォロワー</h2>
        @foreach($followers as $person)
        
      <p>{{$person->name}}</p>
      <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
    @endforeach

        @endsection
    
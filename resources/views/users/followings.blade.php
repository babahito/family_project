@extends("layouts.app")
        @section("content")
        <h2>フォロー</h2>
        @foreach($followings as $person)

        <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
      <p>{{--$person->name--}}</p>

      
      @foreach($articles as $article)
      <p>{{$article->title}}</p>
      <p>{{$article->body}}</p>
      @endforeach
      

    @endforeach

        @endsection
    
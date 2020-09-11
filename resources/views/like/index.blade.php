@extends("layouts.app")
@section("content")

<div class="main_content">
    <h2>Favorite</h2>
        <h3>お気に入りノート</h3>

        
          
        <a class="nav-link text-muted active"
           href="{{ route('users.likes', ['name' => $user->name]) }}">
       ぼたん</a>

  
        @endsection
    
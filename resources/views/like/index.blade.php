@extends("layouts.app")
@section("content")

<div class="main_content">
    <h2>Favorite</h2>
        <h3>お気に入りノート</h3>

        
          
       
       @foreach($posts->id as $item)
        {{$item}}
        
       @endforeach
         
       

  
        @endsection
    
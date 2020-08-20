@extends("layouts.app")
@section("content")

    <div class="container">                            
        <article-like
        :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'      
      >
      </article-like>
    </div>
@endsection

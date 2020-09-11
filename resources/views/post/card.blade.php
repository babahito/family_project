@extends("layouts.app_sub")
        @section("content")

<div class="card mt-3">
  <div class="card-body d-flex flex-row">
  {{--略--}}

    @if( Auth::id() === $article->user_id )
      <!-- dropdown -->
      {{--略--}}
      <!-- dropdown -->

      <!-- modal -->
      {{--略--}}
      <!-- modal -->
    @endif

  </div>
  <div class="card-body pt-0 pb-2">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('article.show', ['article' => $article]) }}">
        {{ $article->title }}
      </a>
    </h3>
    <div class="card-text">
      {!! nl2br(e( $article->body )) !!}
    </div>
  </div>
  {{--ここから追加--}}
  <div class="card-body pt-0 pb-2 pl-3">
    <div class="card-text">
      <article-like>
      </article-like>
    </div>
  </div>
  {{--ここまで追加--}}
  
</div>
@endsection
    
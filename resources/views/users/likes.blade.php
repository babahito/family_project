@extends("layouts.app_sub")
@section("content")
<h2>Favorite</h2>
        <h3>お気に入りノート</h3>
        <div class="main_content">
            

                        <!-- 検索 -->
                        <form method="GET" action="{{ url("post") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="search……">
                                <span class="input-group-btn">
                                        <button class="btn btn-info" type="submit">
                                        <span>検索</span>
                                        </button>
                                </span>
                                </div>
                        </form>

<div class="row">
    @foreach($post as $item)
                    
    <div class="col-lg-4">
    <div class="card mb-3" style="max-width: 500px;">
      <div class="row no-gutters">
        <div class="col-lg-6">
            <img src="{{ asset('storage/' . $item->photo) }}">
        </div>
        <div class="col-lg-6">
          <div class="card-body">
            <h4 class="card-title">
                <a href="{{ url("/post/" . $item->id) }}" title="View post">
                                    <span class="card_title">{{ $item->title}}</span></a>
            </h4>
            <article-like
                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                :initial-count-likes='@json($item->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('posts.like', ['item' => $item]) }}">
            </article-like>
            <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">{{$item->user->name}}から</a> 
            <!-- <p class="card-text">ホームページ・ブログ開設など基礎を身に付けたい方向けコースです。</p> -->
            <p>{{ $item->sendtime}}</p>
          </div>
        </div>
      </div>
    </div>
</div>
@endforeach
  </div>
@endsection
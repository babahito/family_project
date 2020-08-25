

@extends("layouts.app")
@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">NOTE一覧（全員分）</div>
                    <div class="panel-body">
                        <!-- 検索 -->
                        <form method="GET" action="{{ url("post") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="submit">
                                        <span>Search</span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <!-- 記事 -->
                        @foreach($post as $item)
                            <div class="card mt-3">
                                <div class="card-body d-flex flex-row">
                                    <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                        <i class="fas fa-user-circle fa-3x mr-1"></i>
                                    </a> 
                                    <div>
                                        <div class="font-weight-bold">
                                            <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">{{ $item->user->name }}から</a>
                                            <span><i class="fas fa-user-circle mr-1"></i>{{ $item->attribute_id}} へ</span>
                                        </div>
                                        <div class="font-weight-lighter">送信日：{{ $item->sendtime}}</div>
                                    </div>
                                    <article-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                        :initial-count-likes='@json($item->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('posts.like', ['post' => $post]) }}">
                                    </article-like>
                                </div>                          
                                <div class="card-body">
                                    <p>タイトル：{{ $item->title}}</p>
                                    <p>本文：{{ $item->body}}</p>
                                    <div><img src="{{ asset('storage/' . $item->photo) }}" width="100px"></div>
                                    <p>作成日：{{ $item->created_at->format('Y/m/d H:i') }}</p>
                                </div>
                            </div>
                        @endforeach
                        <!-- 記事終わり -->
                        <div class="pagination-wrapper"> {!! $post->appends(["search" => Request::get("search")])->render() !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection

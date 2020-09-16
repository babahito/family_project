@extends("layouts.app_sub")
@section("content")

<div class="main_content">
    <h2>Family NOTE</h2>
        <h3>ファミリーノート</h3>
        {{$auth->name}}さん
        @foreach($user_detail as $item)
            <img src="{{ asset('storage/' . $item->photo) }}" width="100px">
            <p>{{ $item->birthday}}</p> 
            <p>{{ $item->comment}} </P>
        @endforeach


        <!-- ノートをかく -->
        <a href="/post/create"><div class="pink_btn" ><i class="fas fa-plus"></i>&nbsp;ノートをかく</div></a>
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

       
       
         
       

                        <!-- メイン部分 -->
                <!-- カード部分 -->




                <div class="row">
                    @foreach($post as $item)
                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)
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
                                                    <span class="card_title">{{ $item->title}}</span>
                                                </a>
                                            </h4>
                                            <a href="{{ url("/post/" . $item->id . "/edit") }}" title="Edit post"><i class="far fa-edit fa-2x"></i></a>
                                            <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                {{ csrf_field() }}
                                                
                                                {{ method_field("DELETE") }}
                                                <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')">
                                                    <i class="fas fa-trash fa-2x"></i>
                                                </button>    
                                            </form>
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                            <p>
                                                <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                                    {{$item->user->name}}
                                                </a> 
                                            </p>
                                            <p>{{ $item->attribute_id }}さんへ</p>
                                            <p>{{ $item->sendtime }}</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="col-lg-4" style="display:none">
                                <div class="card mb-3" style="max-width: 500px;">
                                    <div class="row no-gutters">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('storage/' . $item->photo) }}">
                                        </div>
                                        <div class="col-lg-6">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="{{ url("/post/" . $item->id) }}" title="View post">
                                                    <span class="card_title">{{ $item->title}}</span>
                                                </a>
                                            </h4>
                                            <a href="{{ url("/post/" . $item->id . "/edit") }}" title="Edit post"><i class="far fa-edit fa-2x"></i></a>
                                            <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                {{ csrf_field() }}
                                                
                                                {{ method_field("DELETE") }}
                                                <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')">
                                                    <i class="fas fa-trash fa-2x"></i>
                                                </button>    
                                            </form>
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                            <p>
                                                <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                                    {{$item->user->name}}
                                                </a> 
                                            </p>
                                            <p>{{ $item->attribute_id }}さんへ</p>
                                            <p>{{ $item->sendtime }}</p>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        @endif
                    @endforeach
                </div>    
        @endsection
    
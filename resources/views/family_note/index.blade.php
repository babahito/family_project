@extends("layouts.app_sub")
@section("content")

<div class="main_content">
    <h2>NOTE</h2>
        <h3>ノート</h3>

            <div class="family_top">
                <div class="family_user">
                    @foreach($users as $user)
                        <div>
                            <ul>
                                <li>
                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                        <img src="{{ asset('storage/' .  $user->user_detail->photo) }}" class="person_icon">
                                    </a>
                                </li>
                            </ul>
                        </div>            
                    @endforeach
                </div>

            </div>

            <!-- 検索 -->
                <div>
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
                </div>


            <!-- メイン部分 -->
                <!-- カード部分 -->
                <div class="card_box">
                    @foreach($post as $item)
                    
                        <div class="card">
                            <div class="card_mini">
                                <div class="card_img">
                                    <img src="{{ asset('storage/' . $item->photo) }}">
                                </div>
                                <div class="card_body">
                                <a href="{{ url("/post/" . $item->id) }}" title="View post">
                                    <span class="card_title">{{ $item->title}}</span>
                                    </a>
                                    <article-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                        :initial-count-likes='@json($item->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                    </article-like>
                                    <p>
                                        <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                        <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
                                            {{$item->user->name}}
                                        </a> 
                                    </p>
                                    <p>{{ $item->created_at->format('Y/m/d ') }}</p>
                                    <p>{{ $item->history}}</p>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>      
    </div>
 @endsection

 

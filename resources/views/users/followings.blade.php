@extends("layouts.app_sub")
        @section("content")
        <div class="main_content">
        <h2>Family NOTE</h2>
        <h3>ファミリーノート</h3>

            <div class="family_top">
                <div class="family_user">
                @foreach($followings as $person)
                        <div>
                            <ul>
                                <li>
                                <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
                                    <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
                                    </a>
                                </li>
                            </ul>
                        </div>            
                    @endforeach
                </div>

            </div>
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
                  @foreach($followings as $person)
                  @foreach($person->posts as $item)

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
                                    <!-- <p class="card-text">ホームページ・ブログ開設など基礎を身に付けたい方向けコースです。</p> -->
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
                                    {{ $item->sendtime }}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                        @endforeach
                    @endforeach
                </div>      




        

                </div> 
</div>



        @endsection
    
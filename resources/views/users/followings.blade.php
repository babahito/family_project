@extends("layouts.app_sub")
        @section("content")
        <div class="main_content">
            <h2>Family NOTE</h2>
            <h3>ファミリーノート</h3>
                <!-- メンバー一覧 -->
                <div class="family_top">
                    <div class="family_user">
                    @foreach($followings as $person)
                            <div>
                                <ul>
                                    <li>
                                        <a href="{{ route('users.show', ['name' => $person->name]) }}">
                                        <figure class="effect-color">
                                            <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
                                            <figure class="effect-color">
                                        </a>
                                    </li>
                                </ul>
                            </div>            
                        @endforeach
                    </div>
                </div>
                <!-- end -->

                <!-- 検索 -->
                <div class="search_box">
                    <form method="GET" action="{{ url("post") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg" name="search" placeholder="検索する">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-light">検索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end -->

                <!-- カード部分 -->
                <div class="card_box">
                    <div class="row">
                        @foreach($followings as $person)
                        @foreach($person->posts as $item)

                        <div class="col-lg-4 mb-5">
                                <!-- 表示の場合 -->
                                @if($day>$item->sendtime)
                                <div class="card">
                                    <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                            <a href="{{ url("/post/" . $item->id) }}" class="stretched-link">
                                                    <span class="card_title">{{ $item->title}}</span>
                                                    </a>
                                            </h4>
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                            <p class="card-text"><a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">{{$item->user->name}}</a> </p>
                                            <p class="card-text">{{ $item->sendtime }}</p>
                                        </div>
                                </div>
                            @endif
     
                        </div>
                        @endforeach
                        @endforeach
                    </div>  
                </div>
                <!-- end -->
        </div>
    @endsection
    
@extends("layouts.app_sub")
    @section("content")
    <!-- gnavi -->
    <nav class="bread-crumbs">
    <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li itemprop="itemListElement" itemscope
        itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="{{ url('post') }}">
            <i class="fas fa-home"></i><span itemprop="name">ホーム</span>
            </a>
        <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope
        itemtype="https://schema.org/ListItem">
            
            <span itemprop="name">Follower NOTE(フォロワーノート)</span>
            
        <meta itemprop="position" content="2" />
        </li>
    </ol>
    </nav>
    <!-- end -->


        <main>
            <h2>Follower NOTE</h2>
                <!-- メンバー一覧 -->
                <div class="row">
                                @foreach($followings as $person)
                                <div class="col-xs-12 col-sm-6 col-md-4 mb-5">
                                        <a href="{{ route('users.show', ['name' => $person->name]) }}">
                                            <figure class="effect-color_mini">
                                                @if(!isset($person->user_detail->photo))
                                                <div style="text-align:center;">
                                                    <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon_mini">
                                                    <p style="margin-top:10px;">{{$person->name}}</p>
                                                </div>
                                                @else
                                                <div style="text-align:center;">
                                                    <img src="data:image/png;base64,{{ $person->user_detail->photo }}" class="person_icon_mini">
                                                    <p style="margin-top:10px;">{{$person->name}}</p>
                                                </div>
                                                @endif
                                                <!-- <img src="{{-- asset('storage/' .  $person->user_detail->photo) --}}" class="person_icon"> -->
                                            </figure>
                                        </a>
</div>
                                    @endforeach
</div>
                <!-- end -->

                <!-- 検索 -->
                <!-- <div class="search_box">
                    <form method="GET" action="{{-- url("post") --}}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control form-control-lg" name="search" placeholder="検索する">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-light">検索</button>
                            </div>
                        </div>
                    </form>
                </div> -->
                <!-- end -->

                <!-- カード部分 -->
                <div class="card_box">
                    <div class="row">
                        @foreach($followings as $person)
                        @foreach($person->posts as $item)

                        <div class="col-xs-12 col-sm-6 col-md-4 mb-5">
                                <!-- 表示の場合 -->
                                @if($day>$item->sendtime)
                                <div class="card">
                                <img src="data:image/png;base64,{{ $item->photo }}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                    <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;"> -->
                                        <div class="card-body">
                                            <p class="note_title">
                                            <a href="{{ url("/post/" . $item->id) }}" class="stretched-link text-dark">
                                                    <span class="card_title">{{ $item->title}}</span>
                                                    </a>
                                            </p>
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                            <p class="card-text"><a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">投稿者：{{$item->user->name}}</a> </p>
                                            <p class="card-text">投稿日時：{{ $item->sendtime }}</p>
                                        </div>
                            </div>
                        <!-- 非表示の場合 -->
                            @else
                                <div class="card">
                                    <img src="{{ asset('/assets/images/mirai_note.png') }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                        <div class="card-body">
                                            <p class="note_title">メッセージ送信中・・・</p>
                                            <p class="card-text">到着日時：{{ $item->sendtime }}</p>
                                        </div>
                                </div>
                            @endif
     
                        </div>
                        @endforeach
                        @endforeach
                    </div>  
                </div>
                <!-- end -->
</main>
    @endsection
    
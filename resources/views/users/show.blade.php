@extends("layouts.app_sub")
@section("content")


<!-- gnavi -->
<nav class="bread-crumbs">
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('users.followings', ['name' => Auth::user()->name]) }}">
          <i class="fas fa-home"></i><span itemprop="name">ホーム</span>
        </a>
      <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="#">
          <span itemprop="name">NOTE(ノート)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<main>
    <div class="row mb-3">
        <div class="col-lg-9">
            <h2>NOTE</h2>
            <h3>{{ $user->name }}ノート</h3>
        </div>
        <div class="col-lg-3">
          @if( Auth::id() !== $user->id )
                <follow-button
                  class="ml-auto"
                  :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                  :authorized='@json(Auth::check())'
                  endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
                >
            </follow-button>
            @endif
        </div>
    </div>

        <!-- 他者紹介 -->
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-xs-5">
                    @if(!isset($user->user_detail->photo))
                      <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                    @else
                      <img src="{{ asset('storage/' .  $user->user_detail->photo) }}" class="person_icon">
                    @endif
                    </div>
                    <div class="col-xs-8">
                        <div class="card-body">
                            <h4 class="cartitle">{{ $user->name }}さん</h4>
                            @if(!isset($user->user_detail->birthday))
                              <p class="card-text">----</p>
                            @else
                              <p class="card-text">Birthday:<br>{{ $user->user_detail->birthday}}</p>
                            @endif
                            @if(!isset($user->user_detail->comment))
                              <p class="card-text">----</p>
                            @else
                            <p class="card-text">comment:<br>{{ $user->user_detail->comment}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">        
                  <p>
                  <a href="{{ route('users.followings', ['name' => $user->name]) }}"  class="text-muted">{{ $user->count_followings }}  フォロー</a>
                  </p>
                  <p>
                    @foreach($user->followers as $follower)
                      {{$follower->name}},
                    @endforeach
                  </p>
                <p><a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">{{ $user->count_followers }} フォロワー</a></p>
                <p>
                    @foreach($user->followings as $following)
                      {{$following->name}},
                    @endforeach
                </p>
            </div>
        </div>
        


            <!-- 検索 -->
            <div class="search_box">
              <form method="GET" action="{{ url("users") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
              @foreach($post as $item)
                  <div class="col-lg-4 mb-5">

                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)

                            <div class="card">
                                <img src="data:image/png;base64,{{ $item->photo }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;"> -->
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
                                            <p class="card-text">{{ $item->attribute_id }}さんへメッセージ</p>
                                            <p class="card-text">{{ $item->sendtime }}</p>
                                    </div>
                            </div>
                    
                      <!-- 非表示の場合 -->
                      @else
                            <div class="card">
                                <p>メッセージが届きます<p>
                                <p class="card-text">{{ $item->sendtime }}</p>
                            </div>
                    @endif
                   
                  </div>
                  @endforeach
                  
          </div>
          </div>
          <!-- end -->

</main>
@endsection


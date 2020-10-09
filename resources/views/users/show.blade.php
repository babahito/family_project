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
        
          <span itemprop="name">NOTE(ノート)</span>
        
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<main>
    <div class="row mb-3">
        <div class="col-lg-9">
            <h2>NOTE</h2>
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


        
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-3 profile_box">
                      <figure class="effect-color">
                        @if(!isset($user->user_detail->photo))
                          <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                        @else
                          <img src="data:image/png;base64,{{ $user->user_detail->photo }}" class="person_icon">
                          <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
                        @endif
                      </figure>
                      <p>
                        @if(!isset($user->user_detail->birthday))
                          <p class="card-text">----</p>
                        @else
                          <p class="card-text">Birthday:<br>{{ $user->user_detail->birthday}}</p>
                        @endif
                      </p>

                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9 mb-3">
                        <div>
                            <h4>{{ $user->name }}</h4>
                              <button type="button" class="gray_btn btn-sm mr-1">
                                <a href="{{ route('users.followings', ['name' => $user->name]) }}"  class="text-muted">{{ $user->count_followings }}  フォロー</a>
                              </button>
                              <button type="button" class="gray_btn btn-sm mr-1">
                                <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">{{ $user->count_followers }} フォロワー</a>
                              </button>
                              @if(!isset($user->user_detail->comment))
                                  <p>------no comment--------</p>
                              @else
                                <p>{{ $user->user_detail->comment}}</p>
                              @endif
                        </div>
                    </div>
                </div>
            </div>

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
                                    <p class="note_title">
                                        <a href="{{ url("/post/" . $item->id) }}" class="stretched-link text-dark">{{ $item->title}} </a>
                                    </p>

                                        <article-like
                                            :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                            :initial-count-likes='@json($item->count_likes)'
                                            :authorized='@json(Auth::check())'
                                            endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                        </article-like>
                                            <!-- <p class="card-text">{{-- $item->attribute_id --}}さんへメッセージ</p> -->
                                            <p class="card-text">到着日時：{{ $item->sendtime }}</p>
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
                  
          </div>
          </div>
          <!-- end -->
          <!-- <div class="d-flex justify-content-center">
                    {{-- $users->links() --}}
                </div> -->
</main>
@endsection


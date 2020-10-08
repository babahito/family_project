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
        
          <span itemprop="name">MY NOTE(マイノート)</span>
        
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->


<main>
  
        <div class="post_note_main">
            <div>
                <h2>MY NOTE</h2>
            </div>
            <div>
                <a href="/post/create"><button class="pink_btn btn-lg"><i class="fas fa-plus"></i>&nbsp;NOTE</button></a>
            </div>
        </div>
   
          <!-- ノートをかく -->
          <div class="row">
        @foreach($user_detail as $item)
        
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-3 profile_box">
                        <figure class="effect-color">
                        @if(!isset($item->photo))
                            <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                        @else
                        <img src="data:image/png;base64,{{ $item->photo }}" class="person_icon">
                        @endif
                        <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="person_icon" style="margin-left:-5px;"> -->
                        @foreach($user_detail as $user_de)
                        </figure>   
                            <p class="profile"><a href="{{ url("/user_detail/" . $user_de->id . "/edit") }}" class="text-danger">プロフィール変更</a></p>
                            
                        @endforeach
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9 mb-3">
                        <div>
                            <h4>{{$auth->name}}</h4>
                            <button type="button" class="gray_btn btn-sm mr-1">
                                <a href="{{ route('users.followings', ['name' => $auth->name]) }}"  class="text-dark">{{ $auth->count_followings }}  フォロー</a>
                                </button>
                        <button type="button" class="gray_btn btn-sm">
                        <a href="{{ route('users.followers', ['name' => $auth->name]) }}"   class="text-dark">{{ $auth->count_followers }} フォロワー</a>
                        </button>
                            @if(!isset($item->comment))
                                <p>-----</p>
                            @else
                            <p>{{ $item->comment}}</p>
                            @endif
                            
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @endforeach



            <!-- 検索 -->
            <div class="search_box">
              <form method="GET" action="{{ url("post") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                  <div class="row">
                      <div class="col-xs-6 col-sm-8 col-md-10">
                          <input type="text" class="form-control form-control-md" name="search" placeholder="検索する">
                      </div>
                      <div class="col-xs-6 col-sm-4 col-md-2 mb-4">
                          <button type="submit"  class="gray_btn text-dark px-2 search_btn btn-sm">検索</button>
                      </div>
                  </div>
              </form>
            </div>
            <!-- end -->

       
            <!-- カード部分 -->
            <div class="card_box">
              <div class="row">
              @foreach($post as $item)
                  <div class="col-xs-12 col-sm-6 col-md-4 mb-5">

                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)

                            <div class="card">
                                <img src="data:image/png;base64,{{ $item->photo }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                
                                <!-- <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;"> -->
                                    <div class="card-body">
                                    <p class="note_title"><a href="{{ url("/post/" . $item->id) }}" class="stretched-link text-dark">{{ $item->title}}</a></p>
                                        @if( Auth::id() === $item->user_id )
                                                    <a href="{{ url("/post/" . $item->id . "/edit") }}" class="text-dark">
                                                            <i class="far fa-edit up_btn"></i>
                                                    </a>
                                                    <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>    
                                                    </form>
                                            @endif
                                        <article-like
                                            :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                            :initial-count-likes='@json($item->count_likes)'
                                            :authorized='@json(Auth::check())'
                                            endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                        </article-like>
                                            <!-- <p class="card-text">{{-- $item->attribute_id --}}さんへメッセージ</p> -->
                                            <p class="card-text">送信日時：{{ $item->sendtime }}</p>
                                    </div>
                            </div>
                    
                    <!-- 非表示の場合 -->
                    @else
                            <div class="card">
                              <img src="{{ asset('/assets/images/mirai_note.png') }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                              <div class="card-body">
                              <p class="note_title">メッセージ送信中・・・</p>
                                @if( Auth::id() === $item->user_id )
                                                    <a href="{{ url("/post/" . $item->id . "/edit") }}">
                                                            <i class="far fa-edit up_btn"></i>
                                                    </a>
                                                    <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>    
                                                    </form>
                                            @endif
                                <p class="card-text">到着日時：{{ $item->sendtime }}</p>
                            </div>
                            </div>
                    @endif
                   
                  </div>
                  @endforeach
                  
              </div>  
       
          <!-- end -->
                 <!-- ページネーション -->
                 <div class="d-flex justify-content-center">
                    {{ $post->links() }}
                </div>
       
</main>


        @endsection
    
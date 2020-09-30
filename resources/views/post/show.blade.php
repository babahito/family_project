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

    <h2>NOTE</h2>
            <h3>ノート</h3>
           <!-- カード部分 -->
           <div class="card_box">
              <div class="row">
        
                  <div class="col-lg-12 mb-5">

                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)

                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top"  style="width:100%; height: auto;object-fit: cover;">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <span class="card_title">{{ $item->title}}</span>
                                            </h4>
                                            @if( Auth::id() === $item->user_id )
                                                        <a href="{{ url("/post/" . $item->id . "/edit") }}">
                                                                <i class="far fa-edit fa-2x up_btn"></i>
                                                        </a>
                                                        <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                            {{ csrf_field() }}
                                                            
                                                            {{ method_field("DELETE") }}
                                                            <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                                <i class="fas fa-trash fa-2x"></i>
                                                            </button>    
                                                        </form>
                                            @endif
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                                <p class="card-text">{{ $item->user->name }}が書いた</p>
                                                <p class="card-text">{{ $item->body }}</p>
                                                <p class="card-text">{{ $item->attribute_id }}さんへメッセージ</p>
                                                <p class="card-text">{{ $item->sendtime }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                      <!-- 非表示の場合 -->
                      @else
                      <div class="card" style="display:none;">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                            <a href="{{ url("/post/" . $item->id) }}" class="stretched-link">
                                                    <span class="card_title">{{ $item->title}}</span>
                                                    </a>
                                            </h4>
                                                        <a href="{{ url("/post/" . $item->id . "/edit") }}">
                                                                <i class="far fa-edit fa-2x up_btn"></i>
                                                        </a>
                                                        <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                            {{ csrf_field() }}
                                                            
                                                            {{ method_field("DELETE") }}
                                                            <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                                <i class="fas fa-trash fa-2x"></i>
                                                            </button>    
                                                        </form>
                                            <article-like
                                                :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                                :initial-count-likes='@json($item->count_likes)'
                                                :authorized='@json(Auth::check())'
                                                endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                            </article-like>
                                                <p class="card-text">{{ $item->body }}</p>
                                                <p class="card-text">{{ $item->attribute_id }}さんへメッセージ</p>
                                                <p class="card-text">{{ $item->sendtime }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endif
                   
                  </div>
             
                  
              </div>  
          </div>
          <!-- end -->
         
       

</div>


</main>
        @endsection
    
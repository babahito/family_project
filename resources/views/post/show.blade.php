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

    <h2>MY NOTE</h2>
           <!-- カード部分 -->
           <div class="card_box">
              <div class="row">
        
                  <div class="col-lg-12 mb-5">

                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)

                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <!-- <img src="data:image/png;base64,{{-- $item->photo --}}"  class="card-img-top"  style="width:100%;object-fit: cover;"> -->
                                        <img class="rounded" src="{{ Storage::disk('s3')->url($item->photo) }}" fclass="card-img-top"  style="width:100%;object-fit: cover;">
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <span class="card_title">{{ $item->title}}</span>
                                            </h4>
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
                                                
                                                <p class="card-text"><pre>{{ $item->body }}</pre></p>
                                                <p class="card-text">投稿者：{{ $item->user->name }}</p>
                                                <!-- <p class="card-text">{{-- $item->attribute_id --}}さんへメッセージ</p> -->
                                                <p class="card-text">投稿日時：{{ $item->sendtime }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                      <!-- 非表示の場合 -->


                      @else
                                <div class="card">
                                    <img src="{{ asset('/assets/images/mirai_note.png') }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                        <div class="card-body">
                                            <h4 class="card-title">メッセージ送信中。おまちください</h4>
                                            <p class="card-text">到着日時：{{ $item->sendtime }}</p>
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
    
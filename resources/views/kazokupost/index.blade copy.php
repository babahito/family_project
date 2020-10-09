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
          <span itemprop="name">MY NOTE(マイノート)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->



<main>
    <div class="row mb-3">
        <div class="col-lg-9">
            <h2>MY NOTE</h2>
            <h3>マイノート</h3>
        </div>
        <div class="col-lg-3">
            <a href="/post/create"><div class="pink_btn" ><i class="fas fa-plus"></i>&nbsp;ノートをかく</div></a>

        </div>
    </div>





            <!-- 検索 -->
            <!-- <div class="search_box">
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
            </div> -->
            <!-- end -->

       
            <!-- カード部分 -->
            <div class="card_box">
              <div class="row">
              @foreach($kazokuposts as $item)
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
        
                                            <p class="card-text">{{ $item->attribute_id }}さんへメッセージ</p>
                                            <p class="card-text">{{ $item->sendtime }}</p>
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
                    @endif

                   
                  </div>
                  @endforeach
                  
              </div>  
          </div>
          <!-- end -->
         
       
</main>


        @endsection
    
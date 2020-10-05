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
                        @if($day>$kazokupost->sendtime)

                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-lg-4">
                                    <img src="data:image/png;base64,{{ $kazokupost->photo }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                                       
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <span class="card_title">{{ $kazokupost->title}}</span>
                                            </h4>
                                            @if( Auth::id() === $kazokupost->user_id )
                                                        <a href="{{ url("/kazokupost/" . $kazokupost->id . "/edit") }}">
                                                                <i class="far fa-edit fa-2x up_btn"></i>
                                                        </a>
                                                        <form method="POST" action="/kazokupost/{{ $kazokupost->id }}" class="form-horizontal" style="display:inline;">
                                                            {{ csrf_field() }}
                                                            
                                                            {{ method_field("DELETE") }}
                                                            <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                                <i class="fas fa-trash fa-2x"></i>
                                                            </button>    
                                                        </form>
                                            @endif
   
                                                <p class="card-text">{{-- $kazokupost->user->name --}}が書いた</p>
                                                <p class="card-text">{{ $kazokupost->body }}</p>
                                                <p class="card-text">{{ $kazokupost->attribute_id }}さんへメッセージ</p>
                                                <p class="card-text">{{ $kazokupost->sendtime }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="card">
                              <img src="{{ asset('/assets/images/mirai_note.png') }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                              <div class="card-body">
                                <h4 class="card-title">メッセージ送信中。おまちください</h4>
                              
                                <p class="card-text">到着日時：{{ $item->sendtime }}</p>
                            </div>
                    @endif
                   
                  </div>
             
                  
              </div>  
          </div>
          <!-- end -->
         
       

</div>


</main>
        @endsection
    
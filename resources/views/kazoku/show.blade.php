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
        
          <span itemprop="name">Family Note(ファミリーノート)</span>

      <meta itemprop="position" content="2" />
    </li>

  </ol>
</nav>
<!-- end -->
<main>


        <div class="post_note_main">
            <div>
                <h2>Family Note</h2>
            </div>
            <div>
                <a href="/kazokupost/create"><button class="pink_btn btn-lg"><i class="fas fa-plus"></i>&nbsp;Note</button></a>
            </div>
        </div>

          <!-- ノートをかく -->
          <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 mb-3 profile_box">
                        <figure class="effect-color">
                        @if(!isset( $kazoku->photo))
                            <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                        @else
                            <img src="{{ Storage::disk('s3')->url($kazoku->photo) }}" class="person_icon">
                            <!-- <img src="data:image/png;base64,{{--  $kazoku->photo --}}" class="person_icon"> -->
                        @endif
                        
                 
                        </figure>   
                            <p class="profile">家族誕生日<br>{{$kazoku->family_date}}</p>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-9 mb-3">
                        <div class="card-body">
                                <h4 class="card-title">{{$kazoku->family_name}}</h4>
                                @if( Auth::id() === $kazoku->user_id )
                                        <a href="{{ url("/kazoku/" . $kazoku->id . "/edit") }}" title="Edit post" class="text-dark"><i class="far fa-edit"></i></a>
                                        <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" style="display:inline;">
                                                {{ csrf_field() }}
                                                {{ method_field("DELETE") }}
                                                <button type="submit"  title="Delete User" onclick="return confirm('削除してもよろしいでしょうか')"><i class="fas fa-trash"></i></button>   
                                        </form>
                                @endif 
                                
                                <p class="card-text">{{ $kazoku->history }}</p>
 
                                <kazoku-like
                                        :initial-is-kazoku-by='@json($kazoku->isKazokuBy(Auth::user()))'
                                        :initial-count-kazokus='@json($kazoku->count_kazokus)'
                                        :authorized='@json(Auth::check())' 
                                        endpoint="{{route('kazokus.like',['kazoku'=>$kazoku])}}"
                                        >
                                </kazoku-like>
                                <p>メンバー：
                                        @foreach($kazoku->kazoku_user as $user)
                                        <a href="{{ route('users.show', ['name' => $user->name]) }}">
                                        <button class="gray_btn btn-sm">
                                                {{$user->name}}
                                        </button>
                                        </a>
                                        @endforeach
                                </p>

                        </div>
                    </div>

                </div>
            </div>

        </div>





            <!-- カード部分 -->
            <div class="card_box">
              <div class="row">
              @foreach($kazokuposts as $item)
                  <div class="col-lg-4 mb-5">

                        <!-- 表示の場合 -->
                        @if($day>$item->sendtime)

                            <div class="card">
                            <img src="{{ Storage::disk('s3')->url($item->photo) }}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;">
                            <!-- <img src="data:image/png;base64,{{-- $item->photo --}}"  class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;"> -->
                                <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="card-img-top"  style="width:100%; height: 180px;object-fit: cover;"> -->
                                        <div class="card-body">
                                        <p class="note_title">
                                                <a href="{{ url("/kazokupost/" . $item->id) }}" class="stretched-link text-dark">
                                                        <span class="card_title">{{ $item->title}}</span>
                                                        </a>
                                                </a>
                                        </p>
                                        @if( Auth::id() === $item->user_id )
                                                    <a href="{{ url("/kazokupost/" . $item->id . "/edit") }}" class="text-dark">
                                                            <i class="far fa-edit up_btn"></i>
                                                    </a>
                                                    <form method="POST" action="/kazokupost/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" title="Delete User" onclick="return confirm('削除してもよろしいですか')" class="up_btn">
                                                            <i class="fas fa-trash"></i>
                                                        </button>    
                                                    </form>
                                        @endif
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
                                                    <a href="{{ url("/kazokupost/" . $item->id . "/edit") }}">
                                                            <i class="far fa-edit up_btn"></i>
                                                    </a>
                                                    <form method="POST" action="/kazokupost/{{ $item->id }}" class="form-horizontal" style="display:inline;">
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
          </div>


            <!-- </div> -->
            </main>
        @endsection
    
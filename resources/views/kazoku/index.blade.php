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
                
                <span itemprop="name">Family(家族)</span>
                
        <meta itemprop="position" content="2" />
        </li>
        </ol>
        </nav>
        <!-- end -->

<main>


<!-- <div class="row mb-3">
        <div class="col-md-8">
            <div>
                <h2>Family</h2>
            </div>
            <div class="col-md-2">
                <a href="/kazoku/create"><button class="pink_btn" ><i class="fas fa-users"></i>&nbsp;家族をつくる</button></a>
                </div>
            <div class="col-md-2">
                <a href="/hello/create"><button class="pink_btn" ><i class="fas fa-paper-plane"></i>&nbsp;家族をさそう</button></a>
            </div>
        </div>
</div> -->
    <div class="row mb-3">
        <div class="col-sm-8">
                <h2>Family</h2>
        </div>
        <div class="col-sm-4">
                <div class="row mb-3">
                        <div class="col-xs-6 m-2">
                                <a href="/kazoku/create"><button class="pink_btn"><i class="fas fa-users"></i>&nbsp;家族をつくる</button></a>
                        </div>
                        <div class="col-xs-6 m-2">
                                <a href="/hello/create"><button class="pink_btn"><i class="fas fa-paper-plane"></i>&nbsp;家族をさそう</button></a>
                        </div>
                </div>
        </div>
    </div>


        <!-------------- 多対多 --------------->
        <!-- @foreach($kk as $k)              
                <p>{{--dd($k->kazokuposts)--}}</P>
        @endforeach -->
        <!-- --------------------------------- -->
                        <!-- 検索 -->
                        <!-- <form method="GET" action="{{-- url("kazoku") --}}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="search……">
                                <span class="input-group-btn">
                                        <button class="btn btn-info" type="submit">
                                        <span>検索</span>
                                        </button>
                                </span>
                                </div>
                        </form> -->


   <!-- 以下タブの表示設定 -->

   
   <ul id="myTabs"  class="nav nav-tabs nav-justified">
      <li role="presentation" class="active"><a href="#home"  aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">参加家族</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="nav-link">つくった家族</a></li>
    </ul>
 
    <!-- Tab panes(以下、タブを押したときに表示する中身) -->
    <div class="tab-content p-2 ">
        <div role="tabpanel" class="tab-pane active fade show" id="home">

                <!-- カード部分 -->
                <div class="row">
                @foreach($kazokus as $kazoku)
            
                <div class="col-lg-6">
                <!-- 表示非表示を設定 -->
                        <div class="card mb-2" style="max-width: 500px;">
                                <div class="row no-gutters">
                                        <div class="col-lg-4">
                                                <a href="{{ url("/kazoku/" . $kazoku->id) }}" title="View post dark-text">
                                                        <figure class="effect-color">
                                                                @if(!isset($kazoku->photo))
                                                                <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                                                                @else
                                                                <img src="data:image/png;base64,{{ $kazoku->photo }}" class="person_icon">
                                                                @endif
                                                                <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="person_icon" style="margin-left:-5px;"> -->
                                                                
                                                        </figure>
                                                </a>  
                                        <p class="profile">家族誕生日：{{$kazoku->family_date}}</p>
                            



                                      
                                        </div>
                                        <div class="col-lg-8">
                                                <div class="card-body">
                                                <p class="note_title">{{$kazoku->family_name}}</p>
                                                         @if( Auth::id() === $kazoku->user_id )
                                                                <a href="{{ url("/kazoku/" . $kazoku->id . "/edit") }}" title="Edit post"><i class="far fa-edit"></i></a>
                                                                <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" style="display:inline;">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field("DELETE") }}
                                                                        <button type="submit"  title="Delete User" onclick="return confirm('削除してもよろしいでしょうか')"><i class="fas fa-trash"></i></button>   
                                                                </form>
                                                         @endif
                                                        
                                                         <kazoku-like
                                                                :initial-is-kazoku-by='@json($kazoku->isKazokuBy(Auth::user()))'
                                                                :initial-count-kazokus='@json($kazoku->count_kazokus)'
                                                                :authorized='@json(Auth::check())' 
                                                                endpoint="{{route('kazokus.like',['kazoku'=>$kazoku])}}"
                                                                >
                                                        </kazoku-like>
                                                        <p>メンバー：<br>
                                                                @foreach($kazoku->kazoku_user as $user)
                                                                
                                                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
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
                @endforeach
                </div>
                <!-- end -->
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile">
                  <!-- カード部分 -->
                  <div class="row">
                @foreach($kazokuadmin as $kazoku)
            
                <div class="col-lg-6">
                <!-- 表示非表示を設定 -->
                        <div class="card mb-2" style="max-width: 500px;">
                                <div class="row no-gutters">
                                        <div class="col-lg-4">

                                        <a href="{{ url("/kazoku/" . $kazoku->id) }}" title="View post">
                                                <figure class="effect-color">
                                                        @if(!isset($kazoku->photo))
                                                        <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon">
                                                        @else
                                                        <img src="data:image/png;base64,{{ $kazoku->photo }}" class="person_icon">
                                                        @endif
                                                        <!-- <img src="{{-- asset('storage/' . $item->photo) --}}" class="person_icon" style="margin-left:-5px;"> -->
                                                        
                                                </figure>
                                        </a> 
                                        <p class="profile">家族誕生日：{{$kazoku->family_date}}</p>

                                        </div>
                                        <div class="col-lg-8">
                                                <div class="card-body">
                                                        <p class="note_title">{{$kazoku->family_name}}</p>
                                                         @if( Auth::id() === $kazoku->user_id )
                                                                <a href="{{ url("/kazoku/" . $kazoku->id . "/edit") }}" title="Edit post"><i class="far fa-edit"></i></a>
                                                                <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" style="display:inline;">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field("DELETE") }}
                                                                        <button type="submit"  title="Delete User" onclick="return confirm('削除してもよろしいでしょうか')"><i class="fas fa-trash"></i></button>   
                                                                </form>
                                                         @endif
                                                         <kazoku-like
                                                                :initial-is-kazoku-by='@json($kazoku->isKazokuBy(Auth::user()))'
                                                                :initial-count-kazokus='@json($kazoku->count_kazokus)'
                                                                :authorized='@json(Auth::check())' 
                                                                endpoint="{{route('kazokus.like',['kazoku'=>$kazoku])}}"
                                                                >
                                                        </kazoku-like>
                                                       
                                                        <p>メンバー：<br>
                                                                @foreach($kazoku->kazoku_user as $user)
                                                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
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
                @endforeach
                </div>
                <!-- end -->
        </div>
</div>










        
        </main>
        </div>
        @endsection
    
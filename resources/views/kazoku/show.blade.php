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
          <span itemprop="name">Family(家族)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>

  </ol>
</nav>
<!-- end -->
<main>
        <div class="row mb-3">
                <div class="col-lg-9">
                <h2>Family</h2>
                <h3>ファミリー</h3>
                </div>
                <div class="col-lg-3">
                <a href="/kazokupost/create"><div class="pink_btn" ><i class="fas fa-plus"></i>&nbsp;ノートをかく</div></a>

                </div>
        </div>
                <div class="row">
                    <div class="col-lg-4">
                <div style="{{ $kazoku->status_class }}">
                        <!-- <div class="card mb-2" style="max-width: 500px;"> -->
                                <div class="row no-gutters">
                                        <div class="col-lg-6">
                                        <a href="{{ url("/kazoku/" . $kazoku->id) }}" title="View post">
                                                <img src="{{ asset('storage/' . $kazoku->photo) }}" class="family_icon"> 
                                                </a>
                                                <p>家族誕生日：{{$kazoku->family_date}}</p>
                                        </div>
                                        <div class="col-lg-6">
                                                <div class="card-body">
                                                        <h4 class="card-title">{{$kazoku->family_name}}</h4>
                                                        @if( Auth::id() === $kazoku->user_id )
                                                                <a href="{{ url("/kazoku/" . $kazoku->id . "/edit") }}" title="Edit post"><i class="far fa-edit fa-2x"></i></a>
                                                                <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" style="display:inline;">
                                                                        {{ csrf_field() }}
                                                                        {{ method_field("DELETE") }}
                                                                        <button type="submit"  title="Delete User" onclick="return confirm('削除してもよろしいでしょうか')"><i class="fas fa-trash fa-2x"></i></button>   
                                                                </form>
                                                        @endif 
                                                        
                                                        <p class="card-text">{{ $kazoku->history }}</p>
                                                        <p>メンバー：
                                                                @foreach($kazoku->kazoku_user as $user)
                                                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                                                        {{$user->name}}
                                                                </a>
                                                                @endforeach
                                                        </p>
                                                        <kazoku-like
                                                                :initial-is-kazoku-by='@json($kazoku->isKazokuBy(Auth::user()))'
                                                                :initial-count-kazokus='@json($kazoku->count_kazokus)'
                                                                :authorized='@json(Auth::check())' 
                                                                endpoint="{{route('kazokus.like',['kazoku'=>$kazoku])}}"
                                                                >
                                                        </kazoku-like>

                                                </div>
                                        </div>
                                </div>
                        </div>

                </div>




            <!-- </div> -->
            </main>
        @endsection
    
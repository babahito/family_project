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
          <span itemprop="name">Member(メンバー)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

  <main>
        <h2>Member</h2>
        <h3>メンバー</h3>
            <!-- 検索 -->
            <div class="search_box">
              <form method="GET" action="{{ url("user") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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




                        <div class="row">
            @foreach($users as $user)
            <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 500px;">
      <div class="row no-gutters">
        <div class="col-lg-6">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                <!-- <img src="data:image/png;base64,{{ $user->user_detail->photo }}" class="person_icon"> -->
                <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
            </a>
        </div>
        <div class="col-lg-6">
          <div class="card-body">
            <h4 class="card-title"> 
                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    {{ $user->name }}
                </a>
            </h4>
            <p class="card-text">{{$user->user_detail->comment}}</p>
            <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
              >
          </follow-button>
          </div>
        </div>
      </div>
    </div>
    </div>





      @endforeach
</main>              
        @endsection
    
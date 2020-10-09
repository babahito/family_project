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
        
          <span itemprop="name">Member(メンバー)</span>
        
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

  <main>
        <h2>Member</h2>
            <!-- 検索 -->
            <div class="search_box">
              <form method="GET" action="{{ url("user") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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



        <div class="row">
            @foreach($users as $user)
            <div class=" col-sm-6 col-md-4 mb-3">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <figure class="effect-color" style="margin:0 auto;">
                            <!-- 登録がない場合 -->
                            @if(!isset($user->user_detail->photo))
                            <img src="{{ asset('/assets/images/noimage.png') }}" class="person_icon" style="margin:5px;">
                            <!-- 登録がある場合 -->
                            @else
                            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                                <img src="data:image/png;base64,{{ $user->user_detail->photo}}" class="person_icon" style="margin:5px;">
                                <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
                            </a>
                            @endif
                            </figure>
                        </div>
                        <div class="col-lg-6">
                          <div class="card-body">
                            <p class="note_title">
                                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">{{ $user->name }}</a>
                            </p>
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
        </div>
        <!-- ページネーション -->
          
</main>  
         
        @endsection
    
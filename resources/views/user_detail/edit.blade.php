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
          <span itemprop="name">MY PAGE(ユーザー設定)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->




<main>
    <h2>My PAGE</h2>
        <h3>ユーザー設定</h3>

              <!-- 本人紹介 -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-xs-5">
                            <img src="{{ asset('storage/' .  $user_detail->photo) }}" class="person_icon">
                            </div>
                            <div class="col-xs-8">
                                <div class="card-body">
                                    <h4 class="cartitle">{{ $auth->name }}さん</h4>
                                    <p class="card-text">Birthday:<br>{{ $user_detail->birthday}}</p>
                                    <p class="card-text">comment:<br>{{ $user_detail->comment}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <!-- end -->



    

            <div>
            <div>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
    
                            <form method="POST" action="/user_detail/{{ $user_detail->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field("PUT") }}

                                    <div>
                                        <input class="form-control" required="required" name="user_id" type="hidden" id="user_id" value="{{$user_detail->user_id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">自己紹介</label>
                                        <textarea name="comment" row="3" class="form-control">{{$user_detail->comment}}</textarea>
                                    </div>
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="birthday">誕生日</label>
                                            <input class="form-control" name="birthday" type="date" id="birthday" value="{{$user_detail->birthday}}">
                                    </div>
    
                                    </div>
                                    <div>
                                        <input type="submit" value="マイページ変更"　class="pink_btn">
                                    </div>
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>




                
        </main>
        @endsection
    
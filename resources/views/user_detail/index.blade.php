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
        @foreach($user_detail as $user_de)
        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-xs-5">
                      <!-- <img src="data:image/png;base64,{{ $item->photo }}" class="person_icon"> -->
                      <!-- <img src="{{ asset('storage/' .  $user_de->photo) }}" class="person_icon"> -->
                    </div>
                    <div class="col-xs-8">
                        <div class="card-body">
                            <h4 class="cartitle">{{ $auth->name }}さん</h4>
                            <p class="card-text">Birthday:<br>{{ $user_de->birthday}}</p>
                            <p class="card-text">comment:<br>{{ $user_de->comment}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">        
            <a href="{{ url("/user_detail/" . $user_de->id . "/edit") }}" title="Edit user_detail"><button class="btn btn-primary btn-xs">Edit</button></a>
            </div>
        </div>
        @endforeach





        <div>
            <div>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method="POST" action="/user_detail/store"  enctype='multipart/form-data'>
                    {{ csrf_field() }}



                                <div class="form-group">
                                    <label for="com">自己紹介</label>
                                    <textarea class="form-control" id="com" rows="3" name="comment"></textarea>
                                </div>

                                <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="photo">写真をえらぶ </label>
                                    <input name="photo" type="file" id="photo" value="{{old('photo')}}"　class="form-control-file" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="birthday">誕生日: </label><br>
                                        <input name="birthday" type="date" id="birthday" value="{{old('birthday')}}">
                                </div>
                                </div>

                                <div>
                                    <input type="submit" value="マイページ登録"　class="pink_btn">
                                </div>
                                <input class="form-control"  name="user_id" type="hidden" id="user_id" value="{{old('user_id')}}"> 
                        
                </form>
            </div>
        </div>

</div>

</main>
        @endsection
    
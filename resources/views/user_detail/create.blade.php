@extends("layouts.app")
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">


                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/user_detail/store" class="form-horizontal" enctype='multipart/form-data'>
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


<!-- ========================================= -->
                                    <!-- <div class="detail_main">  
    								<div class="image_box">
                                        Photo
                                    </div>
                                    <div class="image_box_min">+<input class="form-control" name="photo" type="file" id="photo" value="{{old('photo')}}" class="file_input"></div>
                                    </div>
                                           
                                        

                                        <div class="detail_main">
                                            <div class="form-group">
                                                <label for="birthday" class="col-md-4 control-label">birthday: </label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="birthday" type="date" id="birthday" value="{{old('birthday')}}">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="comment" class="col-md-4 control-label">comment: </label>
                                                <div class="col-md-6">
                                                    <input class="form-control" name="comment" type="text" id="comment" value="{{old('comment')}}">
                                                </div>
                                            </div>
                        
                                            <div class="form-group">
                                                <div class="col-md-offset-4 col-md-4">
                                                    <input class="btn btn-primary" type="submit" value="Create">
                                                </div>
                                            </div>    
                                            <input class="form-control"  name="user_id" type="text" id="user_id" value="{{old('user_id')}}"> 
                                        </div> -->
                                        <!-- ==================== -->
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endsection
    
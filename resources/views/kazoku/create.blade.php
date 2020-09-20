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
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="#">
          <span itemprop="name">家族をつくる</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

        <main>
                <h2>Family</h2>
                <h3>ファミリー</h3>
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                    <div class="col-md-12">

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/kazoku/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="f_name">家族グループ名</label>
                                            <input name="family_name"  class="form-control"  type="text" id="f_name" value="{{old('family_name')}}" placeholder="家族名">
                                    </div>
                                    <div class="form-group">
                                        <label for="f_history">家族ものがたり</label>
                                        <textarea name="history" class="form-control" id="f_history" value="{{old('history')}}" rows="3" placeholder="家族のものがたりを…"></textarea>
                                            
                                    </div>

                                    <div>
                                        <label for="photo">photo: </label>
                                            <input name="photo" type="file" id="photo" value="{{old('photo')}}">
                                    </div>
                                    <div>
                                        <label for="f_date">家族誕生日: </label>
                                        <input name="family_date" type="date" id="f_date" value="{{old('family_date')}}">
                                    </div>

                                    <div>
                                        <select name="status">
                                            <option value="1">公開</option>
                                            <option value="0">非公開</option>
                                        </select>
                                    </div>
                                    <p></p>
                                    <div>
                                            <input class="pink_btn" type="submit" value="家族をつくる">
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id"></label>
                                            <input name="user_id" class="form-control-file" type="hidden" id="user_id" value="{{old('user_id')}}">
                                    </div>

                                    
                                         
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endsection
    
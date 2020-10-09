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
        <a itemprop="item"  href="{{ url('kazoku') }}">
          <span itemprop="name">Family(家族)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        
          <span itemprop="name">ノートをかく</span>
      
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<!-- <span class="navbar-text">ようこそ！　{{-- Session::get('id') --}} 様</span> -->

    <main>
        <div class="row mb-3">
            <div class="col-lg-9">
                <h2>Family Note</h2>
            </div>
            <!-- <div class="col-lg-3">
                <button class="btn btn-light"><a href="/paint">絵を描く</a></button>
            </div> -->
        </div>
        

                            <div>
                                <div class="row no-gutters">
                                    <div class="col-lg-12">
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                        

                                        <form method="POST" action="/kazokupost/store"  enctype='multipart/form-data'>
                                        {{ csrf_field() }}

                                            <div class="form-group">
                                                <label for="title">タイトル</label>
                                                <input name="title" type="text" id="title" value="{{old('title')}}" placeholder="タイトル" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="body">ノート</label>
                                                <textarea name="body" id="body" value="{{old('body')}}" rows="4" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="photo">写真をえらぶ </label>
                                                <input name="photo" type="file" id="photo" value="{{old('photo')}}"　class="form-control-file" >
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="exampleFormControlSelect2">誰におくる</label>
                                                {{-- Form::select('attribute_id', $client_id_loop,)--}}
                                            </div> -->
                                            <div>
                                                <label for="sendtime">おくる日時: </label>
                                                    <input name="sendtime" type="datetime-local" id="sendtime" value="{{old('sendtime')}}">
                                            </div>
                                            <div>
                                                <label for="user_id"></label>
                                                    <input name="user_id" type="hidden" id="user_id" value="{{old('user_id')}}">
                                            </div>
                                            <div>
                                                <label for="kazokupost_id"></label>
                                                    <input name="kazokupost_id" type="hidden" id="kazokupost_id">
                                            </div>
                                            <div>
                                                    <input class="pink_btn" type="submit" value="ノートをかく">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                                

</main>
        @endsection
    
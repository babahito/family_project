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
        <a itemprop="item">
          <span itemprop="name">MY NOTE(マイノート)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->
<main>
    <h2>MY NOTE</h2>

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
    
                            <form method="POST" action="/post/{{ $post->id }}" class="form-horizontal" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                            <label for="title" class="col-md-12 control-label">タイトル: </label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="title" type="text" id="title" value="{{$post->title}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="body" class="col-md-12 control-label">ノート: </label>
                                            <div class="col-md-12">
                                            
                                                <textarea class="form-control" name="body" id="body"  row="5">{{$post->body}}</textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <div class="col-md-12">
                                                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{$post->user_id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stime" class="col-md-6 control-label">おくる日時: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="sendtime" type="datetime-local" id="stime" value="{{$post->semdtime}}">
                                            </div>
                                        </div>


               
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input class="pink_btn" type="submit" value="修正する">
                                        </div>
                                    </div>   
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endsection
    
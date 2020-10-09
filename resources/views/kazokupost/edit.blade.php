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
    <div class="col-sm-12">
                <h2>Family</h2>
        </div>
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
    
                            <form method="POST" action="/kazokupost/{{ $kazokupost->id }}" class="form-horizontal" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<!-- <div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$kazokupost->id}}</div>
                                    </div> -->
										<div class="form-group">
                                            <label for="title" class="col-md-4 control-label">タイトル: </label>
                                            <div class="col-md-12">
                                                <input class="form-control" name="title" type="text" id="title" value="{{$kazokupost->title}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="body" class="col-md-4 control-label">ノート: </label>
                                            <div class="col-md-12">
                                            
                                                <textarea class="form-control" name="body" id="body"  row="3">{{$kazokupost->body}}</textarea>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <!-- <label for="user_id" class="col-md-4 control-label">user_id: </label> -->
                                            <div class="col-md-12">
                                                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{$kazokupost->user_id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stime" class="col-md-4 control-label">送信日時: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="sendtime" type="datetime-local" id="stime" value="{{$kazokupost->semdtime}}">
                                            </div>
                                        </div>
										<!-- <div class="form-group">
                                            <label for="photo" class="col-md-4 control-label">photo: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="photo" type="file" id="photo" value="{{--$kazokupost->photo--}}">
                                            </div>
                                        </div> -->
										<!-- <div class="form-group">
                                            <label for="attribute_id" class="col-md-4 control-label">attribute_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="attribute_id" type="text" id="attribute_id" value="{{$kazokupost->attribute_id}}">
                                            </div>
                                        </div> -->

               
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-12">
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
    
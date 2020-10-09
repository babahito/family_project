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

        <div class="col-sm-8">
                <h2>Family</h2>
        </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">編集画面 #{{ $kazoku->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("kazoku") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br /> -->

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/kazoku/{{ $kazoku->id }}" class="form-horizontal" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<!-- <div class="form-group">
                                            <label for="id" class="col-md-4 control-label">id: </label>
                                             <div class="col-md-6">{{--$kazoku->id--}}</div>
                                        </div> -->
										<div class="form-group">
                                            <!-- <label for="user_id" class="col-md-4 control-label">user_id: </label> -->
                                            <div class="col-md-12">
                                                <input class="form-control" name="user_id" type="hidden" id="user_id" value="{{$kazoku->user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="f_name" class="col-md-12 control-label">家族名</label>
                                            <div class="col-md-12">
                                                <input class="form-control"  name="family_name" type="text" id="f_name" value="{{$kazoku->family_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="f_date" class="col-md-12 control-label">家族ものがたり</label>
                                            <div class="col-md-12">
                                            <textarea name="history" id="f_history" value="{{old('history')}}" rows="4" class="form-control">{{$kazoku->history}}</textarea>
                                                
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="f_date" class="col-md-12 control-label">家族誕生日</label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="family_date" type="date" id="f_date" value="{{$kazoku->family_date}}" reqiured>
                                            </div>
                                        </div>
										<!-- <div class="form-group">
                                            <select name="status">
                                                <option value="1">公開</option>
                                                <option value="0">非公開</option>
                                                
                                            </select>
                                         </div> -->
                                            
                                        
               
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-12">
                                            <input class="pink_btn" type="submit" value="更新する">
                                        </div>
                                    </div>   
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
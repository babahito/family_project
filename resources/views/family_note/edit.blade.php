@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit post #{{ $post->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("post") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/post/{{ $post->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$post->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="title" class="col-md-4 control-label">title: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="title" type="text" id="title" value="{{$post->title}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="body" class="col-md-4 control-label">body: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="body" type="text" id="body" value="{{$post->body}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="user_id" type="text" id="user_id" value="{{$post->user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="photo" class="col-md-4 control-label">photo: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="photo" type="text" id="photo" value="{{$post->photo}}">
                                            </div>
                                        </div>
               
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-4">
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </div>   
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
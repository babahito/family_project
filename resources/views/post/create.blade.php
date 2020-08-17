
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New post</div>
                            <div class="panel-body">
                                <a href="{{ url("/post") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/post/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

    										<div class="form-group">
                                        <label for="title" class="col-md-4 control-label">title: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="title" type="text" id="title" value="{{old('title')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="body" class="col-md-4 control-label">body: </label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" name="body" id="body" value="{{old('body')}}" rows="3"></textarea>
                                        </div> 



                                    </div>
										<div class="form-group">
                                        <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="user_id" type="text" id="user_id" value="{{old('user_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="photo" class="col-md-4 control-label">photo: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="photo" type="file" id="photo" value="{{old('photo')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="attribute_id" class="col-md-4 control-label">attribute_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="attribute_id" type="text" id="attribute_id" value="{{old('attribute_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="status" class="col-md-4 control-label">status: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="status" type="text" id="status" value="{{old('status')}}">
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="sendtime" class="col-md-4 control-label">sendtime: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="sendtime" type="date" id="sendtime" value="{{old('sendtime')}}">
                                        </div>
                                    </div>
                    
                                    <div class="form-group">
                                        <div class="col-md-offset-4 col-md-4">
                                            <input class="btn btn-primary" type="submit" value="Create">
                                        </div>
                                    </div>     
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
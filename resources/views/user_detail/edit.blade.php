
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit user_detail #{{ $user_detail->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("user_detail") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/user_detail/{{ $user_detail->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$user_detail->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="user_id" type="text" id="user_id" value="{{$user_detail->user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="photo" class="col-md-4 control-label">photo: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="photo" type="file" id="photo" value="{{$user_detail->photo}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="birthday" class="col-md-4 control-label">birthday: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="birthday" type="date" id="birthday" value="{{$user_detail->birthday}}">
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
    

        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New user_detail</div>
                            <div class="panel-body">
                                <a href="{{ url("/user_detail") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/user_detail/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                    <div class="detail_main">  
    								<div class="image_box">
                                        Photo
                                    </div>
                                    <div class="image_box_min">+<input class="form-control" name="photo" type="file" id="photo" value="{{old('photo')}}" class="file_input"></div>
                                    </div>
                                           
                                        
                                    <!-- </div>
										<div class="form-group">
                                        <label for="photo" class="col-md-4 control-label">photo: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" name="photo" type="file" id="photo" value="{{old('photo')}}" class="file_input">
                                            </div> -->
                                        <!-- </div> -->
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
                                        </div>
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
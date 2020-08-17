
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New follow</div>
                            <div class="panel-body">
                                <a href="{{ url("/follow") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/follow/store" class="form-horizontal">
                                    {{ csrf_field() }}

    										<div class="form-group">
                                        <label for="follower_id" class="col-md-4 control-label">follower_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="follower_id" type="text" id="follower_id" value="{{old('follower_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="followee_id" class="col-md-4 control-label">followee_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" name="followee_id" type="text" id="followee_id" value="{{old('followee_id')}}">
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
    
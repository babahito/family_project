
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create New mail_send</div>
                            <div class="panel-body">
                                <a href="{{ url("/mail_send") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                
                                <form method="POST" action="/mail_send/store" class="form-horizontal">
                                    {{ csrf_field() }}

    										<div class="form-group">
                                        <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="user_id" type="text" id="user_id" value="{{old('user_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="send_user_id" class="col-md-4 control-label">send_user_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="send_user_id" type="text" id="send_user_id" value="{{old('send_user_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="post_id" class="col-md-4 control-label">post_id: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="post_id" type="text" id="post_id" value="{{old('post_id')}}">
                                        </div>
                                    </div>
										<div class="form-group">
                                        <label for="send_day" class="col-md-4 control-label">send_day: </label>
                                        <div class="col-md-6">
                                            <input class="form-control" required="required" name="send_day" type="date" id="send_day" value="{{old('send_day')}}">
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
    
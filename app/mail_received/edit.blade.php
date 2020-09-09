
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit mail_received #{{ $mail_received->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("mail_received") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/mail_received/{{ $mail_received->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$mail_received->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="user_id" type="text" id="user_id" value="{{$mail_received->user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="received_user_id" class="col-md-4 control-label">received_user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="received_user_id" type="text" id="received_user_id" value="{{$mail_received->received_user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="post_id" class="col-md-4 control-label">post_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="post_id" type="text" id="post_id" value="{{$mail_received->post_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="received_day" class="col-md-4 control-label">received_day: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="received_day" type="date" id="received_day" value="{{$mail_received->received_day}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="received_life" class="col-md-4 control-label">received_life: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="received_life" type="text" id="received_life" value="{{$mail_received->received_life}}">
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
    
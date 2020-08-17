
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Edit mail_send #{{ $mail_send->id }}</div>
                            <div class="panel-body">
                                <a href="{{ url("mail_send") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <br />
                                <br />

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/mail_send/{{ $mail_send->id }}" class="form-horizontal">
                                        {{ csrf_field() }}
                                        {{ method_field("PUT") }}
            
										<div class="form-group">
                                        <label for="id" class="col-md-4 control-label">id: </label>
                                        <div class="col-md-6">{{$mail_send->id}}</div>
                                    </div>
										<div class="form-group">
                                            <label for="user_id" class="col-md-4 control-label">user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="user_id" type="text" id="user_id" value="{{$mail_send->user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="send_user_id" class="col-md-4 control-label">send_user_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="send_user_id" type="text" id="send_user_id" value="{{$mail_send->send_user_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="post_id" class="col-md-4 control-label">post_id: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="post_id" type="text" id="post_id" value="{{$mail_send->post_id}}">
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label for="send_day" class="col-md-4 control-label">send_day: </label>
                                            <div class="col-md-6">
                                                <input class="form-control" required="required" name="send_day" type="date" id="send_day" value="{{$mail_send->send_day}}">
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
    
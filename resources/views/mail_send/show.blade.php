@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mail_send {{ $mail_send->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("mail_send") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("mail_send") ."/". $mail_send->id . "/edit" }}" title="Edit mail_send"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/mail_send/{{ $mail_send->id }}" class="form-horizontal" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field("delete") }}
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                        Delete
                                        </button>    
                            </form>
                            <br/>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
										<tr><th>id</th><td>{{$mail_send->id}} </td></tr>
										<tr><th>user_id</th><td>{{$mail_send->user_id}} </td></tr>
										<tr><th>send_user_id</th><td>{{$mail_send->send_user_id}} </td></tr>
										<tr><th>post_id</th><td>{{$mail_send->post_id}} </td></tr>
										<tr><th>send_day</th><td>{{$mail_send->send_day}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
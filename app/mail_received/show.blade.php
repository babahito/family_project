
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mail_received {{ $mail_received->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("mail_received") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("mail_received") ."/". $mail_received->id . "/edit" }}" title="Edit mail_received"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/mail_received/{{ $mail_received->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$mail_received->id}} </td></tr>
										<tr><th>user_id</th><td>{{$mail_received->user_id}} </td></tr>
										<tr><th>received_user_id</th><td>{{$mail_received->received_user_id}} </td></tr>
										<tr><th>post_id</th><td>{{$mail_received->post_id}} </td></tr>
										<tr><th>received_day</th><td>{{$mail_received->received_day}} </td></tr>
										<tr><th>received_life</th><td>{{$mail_received->received_life}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
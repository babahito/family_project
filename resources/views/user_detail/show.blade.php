
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">ユーザー情報</div>
                            <p>{{$auth->name}}さん</p>
                            <div class="panel-body">

                                <a href="{{ url("user_detail") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("user_detail") ."/". $auth->id . "/edit" }}" title="Edit user_detail"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/user_detail/{{ $user_detail->id }}" class="form-horizontal" style="display:inline;">
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
                                    
										<tr><th>photo</th><td><img src="{{ asset('storage/' .$auth->user_detail->photo) }}" width="100px"></td></tr>
										<tr><th>birthday</th><td>{{$auth->user_detail->birthday}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
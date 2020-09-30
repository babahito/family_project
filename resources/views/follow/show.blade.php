@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">follow {{ $follow->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("follow") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("follow") ."/". $follow->id . "/edit" }}" title="Edit follow"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/follow/{{ $follow->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$follow->id}} </td></tr>
										<tr><th>follower_id</th><td>{{$follow->follower_id}} </td></tr>
										<tr><th>followee_id</th><td>{{$follow->followee_id}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
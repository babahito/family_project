@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">post {{ $post->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("family_note") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("family_note") ."/". $post->id . "/edit" }}" title="Edit post"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/family_note/{{ $post->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$post->id}} </td></tr>
										<tr><th>title</th><td>{{$post->title}} </td></tr>
										<tr><th>body</th><td>{{$post->body}} </td></tr>
										<tr><th>user_id</th><td>{{$post->user_id}} </td></tr>
										<tr><th>photo</th><td>{{$post->photo}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
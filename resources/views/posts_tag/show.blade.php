
@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">posts_tag {{ $posts_tag->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("posts_tag") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("posts_tag") ."/". $posts_tag->id . "/edit" }}" title="Edit posts_tag"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/posts_tag/{{ $posts_tag->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$posts_tag->id}} </td></tr>
										<tr><th>post_id</th><td>{{$posts_tag->post_id}} </td></tr>
										<tr><th>tag_id</th><td>{{$posts_tag->tag_id}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    

        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">post_hist {{ $post_hist->id }}</div>
                            <div class="panel-body">

                                <a href="{{ url("post_hist") }}" title="Back"><button class="btn btn-warning btn-xs">Back</button></a>
                                <a href="{{ url("post_hist") ."/". $post_hist->id . "/edit" }}" title="Edit post_hist"><button class="btn btn-primary btn-xs">Edit</button></a>
                                <form method="POST" action="/post_hist/{{ $post_hist->id }}" class="form-horizontal" style="display:inline;">
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
										<tr><th>id</th><td>{{$post_hist->id}} </td></tr>
										<tr><th>post_id</th><td>{{$post_hist->post_id}} </td></tr>
										<tr><th>rev_id</th><td>{{$post_hist->rev_id}} </td></tr>
										<tr><th>title</th><td>{{$post_hist->title}} </td></tr>
										<tr><th>body</th><td>{{$post_hist->body}} </td></tr>
										<tr><th>photo</th><td>{{$post_hist->photo}} </td></tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
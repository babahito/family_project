
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">posts_tag</div>
                            <div class="panel-body">
                            
                            
                                <a href="{{ url("posts_tag/create") }}" class="btn btn-success btn-sm" title="Add New posts_tag">
                                    Add New
                                </a>

                                <form method="GET" action="{{ url("posts_tag") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="submit">
                                                <span>Search</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>


                                <br/>
                                <br/>
                                
                                
                                <div class="table-responsive">
                                <!-- vue -->
                                    <!-- <oosaka-test></oosaka-test> -->
                                    <example-component></example-component>



                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th>id</th><th>post_id</th><th>tag_id</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts_tag as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->post_id}} </td>

                                            <td>{{ $item->tag_id}} </td>
  
                                                <td><a href="{{ url("/posts_tag/" . $item->id) }}" title="View posts_tag"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/posts_tag/" . $item->id . "/edit") }}" title="Edit posts_tag"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/posts_tag/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        Delete
                                                        </button>    
                                                    </form>
                                                   </td>
                                              </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination-wrapper"> {!! $posts_tag->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
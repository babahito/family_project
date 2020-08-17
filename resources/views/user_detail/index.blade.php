
        @extends("layouts.app")
        @section("content")
            <div class="container">


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">ユーザー詳細画面（一覧）</div>
                            <div class="panel-body">
                            
                                <p>{{$auth->name}}さん</p>
                                <a href="{{ url("user_detail/create") }}" class="btn btn-success btn-sm" title="Add New user_detail">
                                    Add New
                                </a>

                                <form method="GET" action="{{ url("user_detail") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr><th>id</th><th>user_id</th><th>photo</th><th>birthday</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_detail as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->user_id}} </td>

                                            <td><img src="{{ asset('storage/' . $item->photo) }}" width="100px"></td>
                                            <td>{{ $item->birthday}}<td>
                                            

                                            <td></td>
  
                                                <td><a href="{{ url("/user_detail/" . $item->id) }}" title="View user_detail"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/user_detail/" . $item->id . "/edit") }}" title="Edit user_detail"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/user_detail/{{ $item->id }}" class="form-horizontal" style="display:inline;">
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
                                    <div class="pagination-wrapper"> {!! $user_detail->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
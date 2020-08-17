
        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">NOTE一覧（全員分）</div>
                            <div class="panel-body">
                            
                            


                                <form method="GET" action="{{ url("post") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                            <tr><th>タイトル</th><th>送信日時</th><th>誰から</th><th>送信相手</th><th>いいね</th></tr>
                                        </thead>
                                        <tbody>
                                        
                                        @foreach($post as $item)
                                    
                                    <tr>
                                  
                                            <!-- <td>{{ $item->id}} </td> -->

                                            <td>{{ $item->title}} </td>

                                            <!-- <td>{{ $item->body}} </td> -->
                                            <td>{{ $item->sendtime}} </td>
                                            <td>{{$item->user->name}}</td>

                                            <!-- <td>{{ $item->user_id}} </td> -->

                                            <!-- <td><img src="{{ asset('storage/' . $item->photo) }}" width="100px"></td> -->

                                            <td>{{ $item->attribute_id}} </td>
                                            <td>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                                                </svg>
                                            </td>

                                            <!-- <td>{{ $item->status}} </td> -->
  
                                                <td><a href="{{ url("/post/" . $item->id) }}" title="View post"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/post/" . $item->id . "/edit") }}" title="Edit post"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
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
                                    <div class="pagination-wrapper"> {!! $post->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
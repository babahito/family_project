@extends("layouts.app_sub")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">mail_send</div>
                            <div class="panel-body">
                            
                            
                                <a href="{{ url("mail_send/create") }}" class="btn btn-success btn-sm" title="Add New mail_send">
                                    Add New
                                </a>

                                <form method="GET" action="{{ url("mail_send") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                                            <tr><th>id</th><th>user_id</th><th>send_user_id</th><th>post_id</th><th>send_day</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mail_send as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->user_id}} </td>

                                            <td>{{ $item->send_user_id}} </td>

                                            <td>{{ $item->post_id}} </td>

                                            <td>{{ $item->send_day}} </td>
  
                                                <td><a href="{{ url("/mail_send/" . $item->id) }}" title="View mail_send"><button class="btn btn-info btn-xs">View</button></a></td>
                                                <td><a href="{{ url("/mail_send/" . $item->id . "/edit") }}" title="Edit mail_send"><button class="btn btn-primary btn-xs">Edit</button></a></td>
                                                <td>
                                                    <form method="POST" action="/mail_send/{{ $item->id }}" class="form-horizontal" style="display:inline;">
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
                                    <div class="pagination-wrapper"> {!! $mail_send->appends(["search" => Request::get("search")])->render() !!} </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
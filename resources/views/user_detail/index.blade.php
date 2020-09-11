@extends("layouts.app_sub")
@section("content")
            <!-- <div class="container">


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default"> -->
                            
<div class="main_content">
    <h2>My PAGE</h2>
        <h3>マイページ</h3>
        {{$auth->name}}さん
        @foreach($user_detail as $item)
            <img src="{{ asset('storage/' . $item->photo) }}" width="100px">
            <p>{{ $item->birthday}}</p> 
            <p>{{ $item->comment}} </P>
        @endforeach


        <div>
            <div>
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method="POST" action="/user_detail/store" class="form-horizontal" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="image_box_min">写真<input class="form-control" name="photo" type="file" id="photo" value="{{old('photo')}}" class="file_input"></div>
                        <div>
                            <label for="birthday" class="col-md-4 control-label">誕生日: </label>
                                <input class="form-control" name="birthday" type="date" id="birthday" value="{{old('birthday')}}">
                            <label for="comment" class="col-md-4 control-label">コメント: </label>
                                <textarea name="" cols="50" rows="10"></textarea>
                                <input class="form-control" name="comment" type="text" id="comment" value="{{old('comment')}}">
                                <input type="submit" value="マイページ変更">
                            
                                <input class="form-control"  name="user_id" type="hidden" id="user_id" value="{{old('user_id')}}"> 
                        </div>
                </form>
            </div>
        </div>

</div>







                            
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
                                            <tr><th>id</th><th>user_id</th><th>photo</th><th>birthday</th><th>comment</th></tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_detail as $item)
                                    
                                    <tr>

                                            <td>{{ $item->id}} </td>

                                            <td>{{ $item->user_id}} </td>

                                            <td><img src="{{ asset('storage/' . $item->photo) }}" width="100px"></td>
                                            <td>{{ $item->birthday}}<td>
                                            
                                            <td>{{ $item->comment}}<td>
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

        @endsection
    

        @extends("layouts.app")
        @section("content")
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">利用者一覧</div>
                            <div class="panel-body">
                            
                            <p></p>
                                <!-- <a href="{{ url("user/create") }}" class="btn btn-success btn-sm" title="Add New post">
                                    Add New
                                </a> -->

                                <form method="GET" action="{{ url("user") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="submit">
                                                <span>検索</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>


                                <br/>
                                <br/>
                                
                                
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thea<tr><th>ID</th><th>名前</th><th>e-mail</th><th>画像</th><th>誕生日</th></tr>
                                            
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                    
                                    <tr>
                                            <td>{{ $user->id}} </td>
                                            <td>{{ $user->name}} </td>
                                            <td>{{ $user->email}} </td>
                                            <td><img src="{{ asset('storage/' . $user->user_detail->photo) }}" width="100px"></td>
                                            <td>{{ $user->user_detail->birthday}}<td>
                                                <td><a href="{{ url("/user/" . $user->id) }}" title="View post"><button class="btn btn-info btn-xs">詳細</button></a></td>
                                                <td><a href="{{ url("/user/" . $user->id . "/edit") }}" title="Edit post"><button class="btn btn-primary btn-xs">編集</button></a></td>
                                                <td>
                                                    <form method="POST" action="/user/{{ $user->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        削除
                                                        </button>    
                                                    </form>
                                                   </td>
                                              </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
    
@extends("layouts.app_sub")
        @section("content")









            <div class="main_content">
    <h2>My PAG</h2>
        <h3>マイページ</h3>

        
            <img src="{{ asset('storage/' . $user_detail->photo) }}" width="100px">
            <p>{{$user_detail->birthday}}</p> 
            <p>{{$user_detail->comment}} </P>
        


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">

                            @if ($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
    
                            <form method="POST" action="/user_detail/{{ $user_detail->id }}" class="form-horizontal">
                                    {{ csrf_field() }}
                                    {{ method_field("PUT") }}

                                    <div>
                                        <input class="form-control" required="required" name="user_id" type="hidden" id="user_id" value="{{$user_detail->user_id}}">
                                    </div>
                                    <div>
                                        <label for="birthday">誕生日</label>
                                            <input class="form-control" name="birthday" type="date" id="birthday" value="{{$user_detail->birthday}}">
                                    </div>
    
                                    <div>
                                        <label for="comment">コメント</label>
                                        <textarea name="comment" cols="50" rows="10">{{$user_detail->comment}}</textarea>
                                            <!-- <input class="form-control" name="comment" type="text" id="comment" value="{{$user_detail->comment}}"> -->
                                    </div>
                                    <div>
                                        <input type="submit" value="マイページ変更">
                                    </div>
                                </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
        @endsection
    
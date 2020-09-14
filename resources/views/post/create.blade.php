@extends("layouts.app_sub")
        @section("content")
        <div class="main_content">
            <h2>Family NOTE</h2>
                <h3>ファミリーノート</h3>
        </div>



            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">

                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                
                                <div class="card">

                                <div>
                    <button class="note_btn"><a href="/paint">絵を描く</a></button>
                </div>
                                <form method="POST" action="/post/store" class="form-horizontal" enctype='multipart/form-data'>
                                    {{ csrf_field() }}

                                    <div>
                                        <label for="title">タイトaaa</label>
                                            <input name="title" type="text" id="title" value="{{old('title')}}" placeholder="タイトル">
                                    </div>
                                    <div>
                                        <label for="body"></label>
                                            <textarea name="body" id="body" value="{{old('body')}}" rows="3"></textarea>
                                    </div>
                                    <div>
                                        <label for="user_id"></label>
                                            <input name="user_id" type="hidden" id="user_id" value="{{old('user_id')}}">
                                    </div>
                                    <div>
                                        <label for="photo">photo: </label>
                                            <input name="photo" type="file" id="photo" value="{{old('photo')}}">
                                    </div>
                                    <div>
                                    {{ Form::select('attribute_id', $client_id_loop,)}}
                                    
                                    </div>
       
                                    <div>
                                        <label for="sendtime">sendtime: </label>
                                            <input name="sendtime" type="datetime-local" id="sendtime" value="{{old('sendtime')}}">
                                    </div>
                                    <div>
                                            <input class="write_btn" type="submit" value="ノートをかく">
                                    </div>

                                    
                                         
                                </form>
                                
</div>

                                    
                        <!-- メイン部分 -->
                <!-- カード部分 -->
                <div class="card_box">
                @foreach($post as $item)
                @if($day>$item->sendtime)
                
                    
                        <div class="card">
                        <p>表示中</p>
                            <div class="card_mini">
                                <div class="card_img">
                                    <img src="{{ asset('storage/' . $item->photo) }}">
                                </div>
                                <div class="card_body">
                                <a href="{{ url("/post/" . $item->id) }}" title="View post">
                                    <span class="card_title">{{ $item->title}}</span>
                                    </a>
                                    <article-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                        :initial-count-likes='@json($item->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                    </article-like>
                                    <p>
                                        <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                        <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
                                            {{$item->user->name}}
                                        </a> 
                                    </p>
                                    <p>{{ $item->attribute_id }}さんへ</p>
                                    <p>表示するかどうか</p>
                                   

                                    

                                    <!-- ======================= -->
                                    <p>テスト中
                                        @foreach($tests as $test)
                                            {{$test->name}}
                                        @endforeach
                                    </p>
                                    <!-- ======================= -->
                                    送りたい時間：{{ $item->sendtime }}
                                    
                                    <a href="{{ url("/post/" . $item->id . "/edit") }}" title="Edit post"><button class="btn btn-primary btn-xs">編集</button></a>
                                    <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        削除
                                                        </button>    
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                <!-- <div class="card" style="display:none"></div> 完全に消すため-->

                <div class="card">
                <p>非表示</p>
                            <div class="card_mini">
                                <div class="card_img">
                                    <img src="{{ asset('storage/' . $item->photo) }}">
                                </div>
                                <div class="card_body">
                                <a href="{{ url("/post/" . $item->id) }}" title="View post">
                                    <span class="card_title">{{ $item->title}}</span>
                                    </a>
                                    <article-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                        :initial-count-likes='@json($item->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{ route('posts.like', ['item' => $item]) }}">
                                    </article-like>
                                    <p>
                                        <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
                                        <!-- <img src="{{-- asset('storage/' .  $user->user_detail->photo) --}}" class="person_icon"> -->
                                            {{$item->user->name}}
                                        </a> 
                                    </p>
                                    <p>{{ $item->attribute_id }}さんへ</p>
                                    <p>表示するかどうか</p>
                                   

                                    

                                    <!-- ======================= -->
                                    <p>テスト中
                                        @foreach($tests as $test)
                                            {{$test->name}}
                                        @endforeach
                                    </p>
                                    <!-- ======================= -->
                                    送りたい時間：{{ $item->sendtime }}
                                    
                                    <a href="{{ url("/post/" . $item->id . "/edit") }}" title="Edit post"><button class="btn btn-primary btn-xs">編集</button></a>
                                    <form method="POST" action="/post/{{ $item->id }}" class="form-horizontal" style="display:inline;">
                                                        {{ csrf_field() }}
                                                        
                                                        {{ method_field("DELETE") }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete User" onclick="return confirm('Confirm delete')">
                                                        削除
                                                        </button>    
                                    </form>
                                </div>
                            </div>
                        </div>


                @endif
                    @endforeach

                </div>    

        @endsection
    
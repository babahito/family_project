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
                                        <label for="att">だれに: </label>
                                            <select name="attribute_id"  id="att" value="{{old('photo')}}">
                                                <option value="サンプル1">サンプル1</option>
                                    </div>
       
                                    <div>
                                        <label for="sendtime">sendtime: </label>
                                            <input name="sendtime" type="date" id="sendtime" value="{{old('sendtime')}}">
                                    </div>
                                    <div>
                                            <input class="write_btn" type="submit" value="ノートをかく">
                                    </div>

                                    
                                         
                                </form>
                                {{ Form::select('FORM_NAME', $client_id_loop, null, ['class' => 'my_class']) }}
</div>
                <!-- カード部分 -->
                <div class="card_box">
                    @foreach($post as $item)
                    
                        <div class="card">
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
                                    {{ $item->created_at->format('Y/m/d H:i') }}
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>  


                            </div>
                        </div>
                    </div>
                </div>





            </div>
        @endsection
    
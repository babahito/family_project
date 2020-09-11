@extends("layouts.app")
@section("content")

<div class="main_content">
    <h2>Family NOTE</h2>
        <h3>ファミリーノート</h3>
        {{$auth->name}}さん
        @foreach($user_detail as $item)
            <img src="{{ asset('storage/' . $item->photo) }}" width="100px">
            <p>{{ $item->birthday}}</p> 
            <p>{{ $item->comment}} </P>
        @endforeach

       
          
       
       
         
       

                        <!-- メイン部分 -->
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
                        
                    @endforeach
                </div>    
        @endsection
    
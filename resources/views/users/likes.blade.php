@extends("layouts.app")
@section("content")
  <div class="container">
   
    <ul class="nav nav-tabs nav-justified mt-3">
      <li class="nav-item">
        <a class="nav-link text-muted active"
           href="{{ route('users.likes', ['name' => $user->name]) }}">
          いいね
        </a>
      </li>
    </ul>


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
                                        endpoint="{{-- route('posts.like', ['item' => $item]) --}}">
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
@endsection
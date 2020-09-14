@extends("layouts.app_sub")
        @section("content")

  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
          <img src="{{ asset('storage/' .  $user->user_detail->photo) }}" class="person_icon">
          </a>
            <!-- フォローボタン -->
            @if( Auth::id() !== $user->id )
              <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
              >
          </follow-button>
          @endif
 
        </div>
        <h2 class="h5 card-title m-0">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            {{ $user->name }}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <div class="card-text">
          <a href="{{ route('users.followings', ['name' => $user->name]) }}"  class="text-muted">
          {{ $user->count_followings }}  フォロー
          </a>
          <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
          {{ $user->count_followers }} フォロワー
          </a>
        </div>
      </div>
    </div>

<div>
<!-- ノート -->
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
                                    <p>{{ $item->created_at->format('Y/m/d ') }}</p>
                                    <p>{{ $item->history}}</p>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>  
  </div>
@endsection


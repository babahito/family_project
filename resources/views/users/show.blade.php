@extends("layouts.app")
        @section("content")

  <div class="container">
    <div class="card mt-3">
      <div class="card-body">
        <div class="d-flex flex-row">
          <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x"></i>
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
  @foreach($post as $item)
  <div class="card mt-3">
      <div class="card-body d-flex flex-row">
          <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">
              <i class="fas fa-user-circle fa-3x mr-1"></i>
              <!-- <img src="{{-- asset('storage/' . $item->deposts->photo) --}}" width="100px"> -->
              
          </a> 
          <div>
              <div class="font-weight-bold">
                  <a href="{{ route('users.show', ['name' => $item->user->name]) }}" class="text-dark">{{ $item->user->name }}から</a>
                  <span><i class="fas fa-user-circle mr-1"></i>{{ $item->attribute_id}} へ</span>
              </div>
              <div class="font-weight-lighter">送信日：{{ $item->sendtime}}</div>
          </div>
          <article-like
              :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
              :initial-count-likes='@json($item->count_likes)'
              :authorized='@json(Auth::check())'
              endpoint="{{-- route('posts.like', ['post' => $post]) --}}">
          </article-like>
      </div>                          
      <div class="card-body">
          <p>タイトル：{{ $item->title}}</p>
          <p>本文：{{ $item->body}}</p>
          <div><img src="{{ asset('storage/' . $item->photo) }}" width="100px"></div>
          <p>作成日：{{ $item->created_at->format('Y/m/d H:i') }}</p>
      </div>
  </div>
@endforeach
  </div>
@endsection


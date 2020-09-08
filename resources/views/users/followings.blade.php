@extends("layouts.app")
        @section("content")
        <div class="main_content">
        <h2>フォロー</h2>
        <h3>ノート</h3>

            <div class="family_top">
                <div class="family_user">
                @foreach($followings as $person)
                        <div>
                            <ul>
                                <li>
                                <a href="{{ route('users.show', ['name' => $person->name]) }}" class="text-dark">
                                    <img src="{{ asset('storage/' .  $person->user_detail->photo) }}" class="person_icon">
                                    </a>
                                </li>
                            </ul>
                        </div>            
                    @endforeach
                </div>

            </div>
 <!-- メイン部分 -->
                <!-- カード部分 -->
                <div class="card_box">
                  @foreach($followings as $person)
                  @foreach($person->posts as $item)
                    <a href="{{ url("/post/" . $item->id) }}" title="View post">
                        <div class="card">
                            <div class="card_mini">
                                <div class="card_img">
                                    <img src="{{ asset('storage/' . $item->photo) }}">
                                </div>
                                <div class="card_body">
                                    <span class="card_title">{{ $item->title}}</span>
                                    <article-like
                                        :initial-is-liked-by='@json($item->isLikedBy(Auth::user()))' 
                                        :initial-count-likes='@json($item->count_likes)'
                                        :authorized='@json(Auth::check())'
                                        endpoint="{{-- route('posts.like', ['post' => $post]) --}}">
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
                        </a>
                        @endforeach
                    @endforeach
                </div>      




        

                </div> 
</div>



        @endsection
    
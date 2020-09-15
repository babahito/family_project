@extends("layouts.app_sub")
@section("content")
        <div class="main_content">
                <h2>Member</h2>
                <h3>メンバー</h3>
            
                        <!-- 検索 -->
                        <form method="GET" action="{{ url("user") }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info" type="submit">
                                                <span>Search</span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                <div class="row">
            @foreach($users as $user)
            <div class="col-lg-4">
            <div class="card mb-3" style="max-width: 500px;">
      <div class="row no-gutters">
        <div class="col-lg-6">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                <img src="{{ asset('storage/' .  $user->user_detail->photo) }}" class="person_icon">
            </a>
        </div>
        <div class="col-lg-6">
          <div class="card-body">
            <h4 class="card-title"> 
                <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    {{ $user->name }}
                </a>
            </h4>
            <p class="card-text">{{$user->user_detail->comment}}</p>
            <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
              >
          </follow-button>
          </div>
        </div>
      </div>
    </div>
    </div>





      @endforeach
</div>                
        @endsection
    
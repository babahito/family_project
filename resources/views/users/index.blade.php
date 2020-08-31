
        @extends("layouts.app")
        @section("content")
            <div class="container">

            @foreach($users as $user)
            <div class="card-body">
        <div class="d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
        <img src="{{ asset('storage/' .  $user->user_detail->photo) }}" class="person_icon">
          </a>

             <!-- フォローボタン -->
             
              <follow-button
                class="ml-auto"
                :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
              >
          </follow-button>
          
        </div>
            <h2 class="h5 card-title m-0">
            <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                    {{ $user->name }}
                </a>
            </h2>
      </div>
      @endforeach
</div>                
        @endsection
    
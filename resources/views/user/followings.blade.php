
        @extends("layouts.app")
        @section('title', $user->name . 'のフォロー中')

@section('content')
  @include('nav')
  <div class="container">
    @include('user.user')
    @include('user.tabs', ['hasArticles' => false, 'hasLikes' => false])
    @foreach($followings as $person)
      @include('user.person')
    @endforeach
  </div>
@endsection

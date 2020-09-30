@extends("layouts.app_sub")
@section("content")
<!-- gnavi -->
<nav class="bread-crumbs">
  <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
      <a itemprop="item" href="{{ route('users.followings', ['name' => Auth::user()->name]) }}">
          <i class="fas fa-home"></i><span itemprop="name">ホーム</span>
        </a>
      <meta itemprop="position" content="1" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="#">
          <span itemprop="name">退会処理</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<main>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>


                <div class="card-body text-center">
                    <form method="POST" action="{{ route('deactive') }}">
                        @csrf
                        <h2>{{ __('このアカウントはご利用できなくなります') }}</h2>
                        <p>{{ __('よろしければ、ボタンをclickしてください') }}</p>
                        <button type="submit" class="btn btn-primary">
                            {{ __('退会する') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
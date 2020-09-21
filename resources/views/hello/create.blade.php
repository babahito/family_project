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
          <span itemprop="name">Family(家族)</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
    <li itemprop="itemListElement" itemscope
      itemtype="https://schema.org/ListItem">
        <a itemprop="item" href="#">
          <span itemprop="name">仲間を誘う</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<main>
    <h2>Family</h2>
    <h3>仲間をさそう</h3>
        <form action="{{ route('hello.send') }}" method="POST">
            @csrf
            <!-- <label for="name">送信する人の名前</label>
            <input name="name" type="text" required> -->
            {{$auth->name}}より
            <br>
            <label for="name">送信したい人の名前</label>
            <input name="send_name" type="text" required>

            <!-- <div class="form-group">
            <label for="exampleFormControlSelect2">誰におくる</label>
            {{ Form::select('attribute_id', $client_id_loop,)}}
        </div> -->
            <br>
            <label for="name">送信したい人のメールアドレス</label>
            <input name="email" type="email" required>
            <br>
            <label for="text">コメント</label>
                <input name="text" type="text" required>
            <br>
            <input type="submit" value="送信">
        </form>
</main>
        @endsection
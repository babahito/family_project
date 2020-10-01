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
          <span itemprop="name">家族を誘う</span>
        </a>
      <meta itemprop="position" content="2" />
    </li>
  </ol>
</nav>
<!-- end -->

<main>
    <h2>Family</h2>
    <h3>家族をさそう</h3>
      <div class="row">
        <div class="col-md-12">
          @if ($errors->any())
              <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          @endif
          <form action="{{ route('hello.send') }}" method="POST">
          {{ csrf_field() }}
              <!-- <label for="name">送信する人の名前</label>
              <input name="name" type="text" required> -->
              <!-- <div> -->
                <!-- <label for="name">家族をえらぶ</label> -->
                  <!-- {{-- Form::select('kazoku_id', $fami_id_loop,)--}} -->
              <!-- </div> -->
              <div class="form-group">
                <label for="name">送信したい人</label>
                    <input name="send_name"  class="form-control"  type="text" id="name" value="" placeholder="送りたい人">
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                    <input name="email"  class="form-control"  type="email" id="email" value="" placeholder="メールアドレス">
              </div>
              <div class="form-group">
                <label for="text">コメント</label>
                      <textarea name="text" id="text" value="" rows="4" class="form-control"></textarea>
              </div>

  <!-- 
              <div class="form-group">
              <label for="exampleFormControlSelect2">誰におくる</label> -->
              <!-- {{ Form::select('send_name', $client_id_loop,)}} -->
          <!-- </div>  -->
              <!-- <br>
              <label for="name">送信したい人のメールアドレス</label>
                <input name="email" type="email" required>
              <br> -->
              <!-- <label for="text">コメント</label>
                <input name="text" type="text" required>
                  <br>
                   -->

              
              <input type="submit" value="送信"　class="pink_btn">
          </form>
      </div>
    </div>
</main>
        @endsection
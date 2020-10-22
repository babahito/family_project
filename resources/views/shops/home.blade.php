
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>管理者サイト</title>
</head>
<body>
    <div id="app">
        <!-- <div id="nav">
          <router-link to="/shop/top">Top</router-link>
          <router-link to="/shop/about">About</router-link>
          <router-link to="/shop/user">ユーザー一覧</router-link>
        </div> -->
        <router-view/>
        <!-- </div> -->
    </div>
      <script src="{{ mix('js/shop.js') }}"></script>
</body>
</html>
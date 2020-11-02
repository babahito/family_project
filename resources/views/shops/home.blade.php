
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" > -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script> -->

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
    <!-- バリテーション -->
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
      <script src="{{ mix('js/shop.js') }}"></script>
</body>
</html>
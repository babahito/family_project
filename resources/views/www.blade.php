<!doctype html>
  <html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- ←① -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- ←② -->
      <title>Laravel-Vue-todo</title>
    </head>
    <body>
      <div id="app"> <!-- ←③ -->
                <table class="table">
            <thead>
                <tr>
                <th>ID</th>
                <th>タスク名</th>
                <th>完了ボタン</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="todo in todos" v-bind:key="todo.id">  <!-- ←v-forを使ってtodosを表示 -->
                <td>@{{ todo.id }}</td>  <!-- ←todoのIDを表示。@を忘れず！ -->
                <td>@{{ todo.title }}</td>  <!-- ←todoのtitleを表示。@を忘れず！ -->
                <td><button class="btn btn-primary">完了</button></td>
                </tr>  <!-- ←完了処理はまた後で設定します。 -->
            </tbody>
            </table>
      </div>
      <script src="{{ asset('js/app.js') }}"></script> <!-- ←④ -->
    </body>
</html>
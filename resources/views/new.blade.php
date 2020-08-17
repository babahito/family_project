<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- CSRFを追加（axios用） -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">


<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<title>Laravel-VUE</title>

<!-- Fonts -->

<!-- Styles -->

</head>
<body>
    <!---------------- vueファイル --------------------->
    <div id="app">
        <app-component></app-component>
    </div>
    <!-- ---------------------------------------- -->

</body>
    
</html>
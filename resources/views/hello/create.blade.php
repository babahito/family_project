<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hello</title>
    </head>
    <body>
        <form action="{{ route('hello.send') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input name="name" type="text" required>
            <br>
            <label for="name">email</label>
            <input name="email" type="email" required>
            <br>
            <label for="text">text</label>
            <input name="text" type="text" required>
            <br>
            <input type="submit" value="送信">
        </form>
    </body>
</html>
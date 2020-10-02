<!DOCTYPE html>
<html lang="ja">
<style></style>
<body>

    
    <h1>{{$auth}}さんから招待が届いています</h1>
    <div>
        @foreach($family_name as $ff)
        馬場さんグループが{{$ff->family_name}}作成されました！
        @endforeach
        ぜひ、ご参加くださいtest
        <button>参加する</button>
    </div>
</body>
</html>




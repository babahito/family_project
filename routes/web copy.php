<?php
use App\Note;
use Illuminate\Http\Request;


// サイトトップ
Route::get('/', function () {
    return view('welcome');
});





// ========会員トップページ=============
//会員トップ画面 
Route::get('/top', function () {
    return view('top');
});


// ========ファミリーNOTE=============
//ファミリーNOTE（一覧）
Route::get('/year_note', function () {
    return view('year_note');
});

// ===========ノート投稿=============
//ノート投稿トップ
Route::get('/note', function () {
    return view('note');
});



// ノート投稿機能
Route::post('/note', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'body' => 'required|max:255',
        // 'user_id' => 'required',
        // 'attribute' => 'required',
        'toukou_time' => 'required',
    ]);
    // //バリデーション:エラー 
    if ($validator->fails()) {

        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // 画像ファイル処理

        //==コントローラー内でのddチェック====
        // dd($request->file('photo'));
        // ==================================?
    $file=$request->file('photo');
        // 空かどうかチェック
        if(!empty($file)){
            // ファイル名を取得
            $filename=$file->getClientOriginalName();
            // ファイルを移動
            $move = $file->move('./upload/',$filename); 
        }else{
            $filename="";
        }
    

    //以下に登録処理を記述（Eloquentモデル）
    $notes = new Note;
    $notes->title=$request->title;
    $notes->body = $request->body;
    $notes->user_id = '1';
    $notes->photo = $filename;
    $notes->attribute =  '1'; $request->title;
    $notes->toukou_time= $request->toukou_time;
    $notes->save(); 
    return redirect('/note');
});

// ノート表示部分
Route::get('/note', function () {
    // $notes = Note::orderBy('created_at', 'desc')->get();
    $note = Note::orderBy('created_at', 'desc')->first();

    return view('note', [
        // 'notes' => $notes,
        'note' => $note,
        
    ]);
});




// =======ノート送信履歴===========
// 送信（一覧）
// Route::get('/send', function () {
//     return view('send');
// });
// ノート表示部分
Route::get('/send', function () {
    $notes = Note::orderBy('created_at', 'desc')->get();
    return view('send', [
        'notes' => $notes
    ]);
});
// ノート削除
Route::delete('/send/{note}', function (Note $note) {
    $note->delete();       //追加
    return redirect('/send');  //追加
});

// 送信（詳細）
// Route::get('/send_detail', function () {
//     return view('send_detail');
// });


// // 送信(編集)
Route::post('/send_edit/{notes}', function (Note $notes) {
    return view('send_edit',[
        'note'=>$notes
    ]);
});


// ノート投稿更新する
Route::post('/send/update', function (Request $request) {
    //バリデーション
    $validator = Validator::make($request->all(), [
        'id'=>'required',
        'title' => 'required|max:255',
        'body' => 'required|max:255',
        // 'user_id' => 'required',
        // 'attribute' => 'required',
        'toukou_time' => 'required',
    ]);
    // //バリデーション:エラー 
    if ($validator->fails()) {

        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // 画像ファイル処理
    $file=$request->file('photo');
    // 空かどうかチェック
    if(!empty($file)){
        // ファイル名を取得
        $filename=$file->getClientOriginalName();
        // ファイルを移動
        $move = $file->move('./upload/',$filename); 
    }else{
        $filename="";
    }

    //以下に登録処理を記述（Eloquentモデル）
    $notes = Note::find($request->id);
    $notes->title=$request->title;
    $notes->body = $request->body;
    $notes->user_id = '1';
    $notes->photo = $filename;
    $notes->attribute =  '1'; $request->title;
    $notes->toukou_time= $request->toukou_time;
    $notes->save(); 
    return redirect('/send');
});


// =========ノート受信==============
// 受信（一覧）
Route::get('/recieve', function () {
    return view('recieve');
});

// 受信（詳細）
Route::get('/recieve_detail', function () {
    return view('recieve_detail');
});

// =========お気に入り==============
// お気に入り（一覧）
Route::get('/favorite', function () {
    return view('favorite');
});




// =========認証==============
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

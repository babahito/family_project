<?php

use Illuminate\Http\Request;


Route::post('fileupload',function(){
    $file_name=request()->file->getClientOriginalName();
    request()->file->storeAs('public/',$file_name);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// =================================
// =====運営側情報=============
// =================================
Route::get('/home',function (Request $request) {
	$users = App\Shop::all();
	return response()->json(['users' => $users]);
});


// ==================================
// =====管理者側のお客様=========
// ==================================

//ユーザー情報表示（全部）
Route::get('/user',function (Request $request) {
	$users = App\User::all();
	return response()->json(['users' => $users]);
});

//ユーザー情報新規作成
Route::post('/user', function(Request $request){

	$user = App\User::create($request->user);

	return response()->json(['user' => $user]);

});

// ユーザー詳細ページへのデータ受け渡し
Route::get('/user/{user}', function(App\User $user){
	return response()->json(['user' => $user]);
});

// ユーザー編集
Route::patch('/user/{user}', function(App\User $user,Request $request){
	$user->update($request->user);
	return response()->json(['user' => $user]);
});

// ユーザー情報削除
Route::delete('/user/{user}', function(App\User $user){
	$user->delete();
	return response()->json(['message' => 'delete successfully']);
});
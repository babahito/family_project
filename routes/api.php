<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('fileupload',function(){
    $file_name=request()->file->getClientOriginalName();
    request()->file->storeAs('public/',$file_name);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

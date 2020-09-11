<?php
use Illuminate\Http\Response;

//default
Route::get("/", function () {
    return view("welcome");
});


Route::get("/top", function () {
    return view("top");
});
// ===-vue&laravel=======================



// ====================================

//=======================================================================
//index
Route::get("user/", "UserController@index");
//create
Route::get("user/create", "UserController@create");
//show
Route::get("user/{id}", "UserController@show");
//store
Route::post("user/store", "UserController@store");
//edit
Route::get("user/{id}/edit", "UserController@edit");
//update
Route::put("user/{id}", "UserController@update");
//destroy
Route::delete("user/{id}", "UserController@destroy");
//=======================================================================


//===================フォロワー====================================================
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', 'UserController@index');
    Route::get('/{name}', 'UserController@show')->name('show');

    // いいねした記事一覧
    Route::get('/{name}/likes', 'UserController@likes')->name('likes');

    // フォロー・フォロワーの一覧表示
    Route::get('/{name}/followings', 'UserController@followings')->name('followings');
    Route::get('/{name}/followers', 'UserController@followers')->name('followers');

    //==========ここから追加==========
    Route::middleware('auth')->group(function () {
        Route::put('/{name}/follow', 'UserController@follow')->name('follow');
        Route::delete('/{name}/follow', 'UserController@unfollow')->name('unfollow');
    });
    //==========ここまで追加==========
});

// フォロー一覧
// http://localhost/users/ママ/followings

//=======================================================================
//index
Route::get("attribute/", "AttributesController@index");
//create
Route::get("attribute/create", "AttributesController@create");
//show
Route::get("attribute/{id}", "AttributesController@show");
//store
Route::post("attribute/store", "AttributesController@store");
//edit
Route::get("attribute/{id}/edit", "AttributesController@edit");
//update
Route::put("attribute/{id}", "AttributesController@update");
//destroy
Route::delete("attribute/{id}", "AttributesController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("user_detail/", "UserDetailsController@index")->middleware();
//create
Route::get("user_detail/create", "UserDetailsController@create");
//show
Route::get("user_detail/{id}", "UserDetailsController@show");
//store
Route::post("user_detail/store", "UserDetailsController@store");
//edit
Route::get("user_detail/{id}/edit", "UserDetailsController@edit");
//update
Route::put("user_detail/{id}", "UserDetailsController@update");
//destroy
Route::delete("user_detail/{id}", "UserDetailsController@destroy");
//=======================================================================

//=======================================================================
//index
// Route::get("kazoku/", "KazokusController@index");
// //create
// Route::get("kazoku/create", "KazokusController@create");
// //show
// Route::get("kazoku/{id}", "KazokusController@show");
// //store
// Route::post("kazoku/store", "KazokusController@store");
// //edit
// Route::get("kazoku/{id}/edit", "KazokusController@edit");
// //update
// Route::put("kazoku/{id}", "KazokusController@update");
// //destroy
// Route::delete("kazoku/{id}", "KazokusController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("follow/", "FollowsController@index");
//create
Route::get("follow/create", "FollowsController@create");
//show
Route::get("follow/{id}", "FollowsController@show");
//store
Route::post("follow/store", "FollowsController@store");
//edit
Route::get("follow/{id}/edit", "FollowsController@edit");
//update
Route::put("follow/{id}", "FollowsController@update");
//destroy
Route::delete("follow/{id}", "FollowsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("bookmark/", "BookmarksController@index");
//create
Route::get("bookmark/create", "BookmarksController@create");
//show
Route::get("bookmark/{id}", "BookmarksController@show");
//store
Route::post("bookmark/store", "BookmarksController@store");
//edit
Route::get("bookmark/{id}/edit", "BookmarksController@edit");
//update
Route::put("bookmark/{id}", "BookmarksController@update");
//destroy
Route::delete("bookmark/{id}", "BookmarksController@destroy");
//=======================================================================

//=======================================================================

Route::get("post/", "PostsController@index");
//create
Route::get("post/create", "PostsController@create");
//show
Route::get("post/{id}", "PostsController@show");
//store
Route::post("post/store", "PostsController@store");
//edit
Route::get("post/{id}/edit", "PostsController@edit");
//update
Route::put("post/{id}", "PostsController@update");
//destroy
Route::delete("post/{id}", "PostsController@destroy");

// -------------unlike用---------------------------

Route::prefix('post')->name('posts.')->group(function () {
    Route::put('/{item}/like', 'PostsController@like')->name('like')->middleware('auth');
    Route::delete('/{item}/like', 'PostsController@unlike')->name('unlike')->middleware('auth');
});

// ------------------------------------------------
//=======================================================================



//=====================絵を描く==================================

Route::get("paint/", function () {
    return view("paint.index");
});


//=======================================================================


// 家族グループ作成=====================================
Route::get("kazoku/", "KazokusController@index");
//create
Route::get("kazoku/create", "KazokusController@create");
// //show
Route::get("kazoku/{id}", "KazokusController@show");
// //store
Route::post("kazoku/store", "KazokusController@store");


ROute::prefix('kazoku')->name('kazokus.')->group(function(){
    Route::put('/{kazoku}/like','KazokusController@like')->name('like')->middleware('auth');
    Route::delete('/{kazoku}/like','KazokusController@unlike')->name('unlike')->middleware('auth');
});
// //edit
// Route::get("kazoku/{id}/edit", "KazokusController@edit");
// //update
// Route::put("kazoku/{id}", "KazokusController@update");
// //destroy
// Route::delete("kazoku/{id}", "KazokusController@destroy");
// ============================================


//=======================================================================
//index
Route::get("family_note/", "FamilynotesController@index");
//create
// Route::get("family_note/like", "PostsController@like");
// //show
// Route::get("family_note/{id}", "familynotesController@show");
// //store
// Route::post("family_note/store", "familynotesController@store");
// //edit
// Route::get("family_note/{id}/edit", "familynotesController@edit");
// //update
// Route::put("family_note/{id}", "familynotesController@update");
// //destroy
// Route::delete("family_note/{id}", "familynotesController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("like/", "LikesController@index");
//create
Route::get("like/create", "LikesController@create");
//show
Route::get("like/{id}", "LikesController@show");
//store
Route::post("like/store", "LikesController@store");
//edit
Route::get("like/{id}/edit", "LikesController@edit");
//update
Route::put("like/{id}", "LikesController@update");
//destroy
Route::delete("like/{id}", "LikesController@destroy");
//=======================================================================

//==============family_note========================================
// Route::get("family_note/", "PostsController@top");
// Route::get("family", function () {
//     return view("family_note.index");
// });

// ==================================================================

//=======================================================================
//index
Route::get("posts_tag/", "PostsTagsController@index");
//create
Route::get("posts_tag/create", "PostsTagsController@create");
//show
Route::get("posts_tag/{id}", "PostsTagsController@show");
//store
Route::post("posts_tag/store", "PostsTagsController@store");
//edit
Route::get("posts_tag/{id}/edit", "PostsTagsController@edit");
//update
Route::put("posts_tag/{id}", "PostsTagsController@update");
//destroy
Route::delete("posts_tag/{id}", "PostsTagsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("tag/", "TagsController@index");
//create
Route::get("tag/create", "TagsController@create");
//show
Route::get("tag/{id}", "TagsController@show");
//store
Route::post("tag/store", "TagsController@store");
//edit
Route::get("tag/{id}/edit", "TagsController@edit");
//update
Route::put("tag/{id}", "TagsController@update");
//destroy
Route::delete("tag/{id}", "TagsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("post_hist/", "PostHistsController@index");
//create
Route::get("post_hist/create", "PostHistsController@create");
//show
Route::get("post_hist/{id}", "PostHistsController@show");
//store
Route::post("post_hist/store", "PostHistsController@store");
//edit
Route::get("post_hist/{id}/edit", "PostHistsController@edit");
//update
Route::put("post_hist/{id}", "PostHistsController@update");
//destroy
Route::delete("post_hist/{id}", "PostHistsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("mail_send/", "MailSendsController@index");
//create
Route::get("mail_send/create", "MailSendsController@create");
//show
Route::get("mail_send/{id}", "MailSendsController@show");
//store
Route::post("mail_send/store", "MailSendsController@store");
//edit
Route::get("mail_send/{id}/edit", "MailSendsController@edit");
//update
Route::put("mail_send/{id}", "MailSendsController@update");
//destroy
Route::delete("mail_send/{id}", "MailSendsController@destroy");
//=======================================================================

//=======================================================================
//index
Route::get("mail_received/", "MailReceivedsController@index");
//create
Route::get("mail_received/create", "MailReceivedsController@create");
//show
Route::get("mail_received/{id}", "MailReceivedsController@show");
//store
Route::post("mail_received/store", "MailReceivedsController@store");
//edit
Route::get("mail_received/{id}/edit", "MailReceivedsController@edit");
//update
Route::put("mail_received/{id}", "MailReceivedsController@update");
//destroy
Route::delete("mail_received/{id}", "MailReceivedsController@destroy");
//=======================================================================


// --------axios練習------
// Route::get('/{app}', function () {  //←追記
//     return view('www');
//   })->where('app', '.*');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

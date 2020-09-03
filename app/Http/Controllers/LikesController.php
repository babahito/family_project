<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\Post;
use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //
        //表示部分
        public function index(Request $request)
        {
            $users = User::all();     
            $likes = Like::all();     
            $posts = Post::all();     
            return view("like.index",compact("users","posts","likes"));
        }
}

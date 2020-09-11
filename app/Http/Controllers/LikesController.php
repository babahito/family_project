<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\Post;
use App\Like;
use Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //
        //表示部分
        // public function index(Request $request)
        // {
            // $users = User::all();     
            // $likes = Like::all();     
            // $posts = Post::all();     
            // return view("like.index",compact("users","posts","likes"));
        // }

        //表示部分
        public function index(Request $request)
        {
            $keyword = $request->get("search");

            $perPage = 25;
    
            if (!empty($keyword)) {
                // $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->orWhere("attribute_id", "LIKE", "%$keyword%")->orWhere("status", "LIKE", "%$keyword%")->paginate($perPage);
                $likes = Like::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%");
                
            } else {
                    $likes = Like::where('user_id',Auth::user()->id)->paginate($perPage);  
                    $posts=Post::where('user_id',Auth::user()->id)->paginate($perPage);  
                               
            }    
            
            return view("like.index", compact("likes","posts"));
        }

}

<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $keyword = $request->get("search");
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->orWhere("email", "LIKE", "%$keyword%");
        } else {
            $users = User::all();             
        }    
        
        // $auths=Auth::user();

        return view("user.index", compact("users"));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }





    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }


// フォロワー用

    // public function show(string $name)
    // {
    //     //
    //     $user = User::where('name', $name)->first();
    //     $user_details = UserDetail::get();

     
    //     $articles = $user->posts->sortByDesc('created_at');
       
    //     return view('user.show', ['user' => $user,'articles' => $articles]);
    // }


    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.show', [
            'user' => $user,
        ]);
    }

    // フォローする
    public function follow(Request $request,string $name){
        $user=User::where('name',$name)->first();

        if($user->id===$request->user()->id){
            return abort('404','あなた自身をフォローできません');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }


    // フォローをはずす
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404','あなた自身をフォローできません');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    // フォロワー一覧情報
    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();

        $followings = $user->followings->sortByDesc('created_at');

        return view('user.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    // いいねした記事
    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();

        $articles = $user->likes->sortByDesc('created_at');

        return view('user.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }
    
    // フォロワー一覧情報
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();

        $followers = $user->followers->sortByDesc('created_at');

        return view('user.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

}

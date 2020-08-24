<?php

namespace App\Http\Controllers;
use App\User;
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

    public function show(string $name)
    {
        //
        $user = User::where('name', $name)->first();
       
        return view('user.show', ['user' => $user]);
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

}

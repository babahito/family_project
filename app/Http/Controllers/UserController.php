<?php

namespace App\Http\Controllers;
use App\User;
use App\UserDetail;
use App\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $keyword = $request->get("search");
        $perPage = 25;



        if (!empty($keyword)) {
            $users = User::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->orWhere("email", "LIKE", "%$keyword%")->paginate($perPage);
        } else {
            $users = User::paginate($perPage);   
                   
        }    
        
        // $auths=Auth::user();

        return view("users.index", compact("users"));
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


    public function show(Request $request,string $name)
    {
        $user = User::where('name', $name)->first();
        $post = $user->posts->sortByDesc('created_at');
        $day=Carbon::now();
        $sendtimes=Post::select('sendtime')->get();

        return view('users.show', compact('user','post','day','sendtimes'));
    }


    public function likes(string $name)
    {
        $user = User::where('name', $name)->first();





        $post = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'post' => $post,
        ]);
        
    }


// ---------------------------------------------------
// --------------フォローする側情報----------------
// --------------------------------------------------
    // フォローする
    public function follow(Request $request,string $name){

        // $userは、フォローされる側（ログインユーザーではない人）
        $user = User::where('name', $name)->first();

        // フォローされる側とフォローリクエストをおこなったユーザー（この場合は、authしているユーザー）の比較
        if ($user->id === $request->user()->id)
        {
            return abort('404', 'あなた自身をフォローできません');
        }
        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        // どのユーザーへのフォローが成功したか、ユーザー名を返します
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

// ---------------------------------------------------
// -------------フォロー＆フォロワー一覧---------------
// --------------------------------------------------

    // フォロー一覧
    public function followings(string $name)
    {
        $user = User::where('name', $name)->first();
        $followings = $user->followings->sortByDesc('created_at');
        $articles = $user->posts->sortByDesc('created_at');
        $day=Carbon::now();
        $sendtimes=Post::select('sendtime')->get();

      
        return view('users.followings', compact("user","followings","articles","day","sendtimes"));
    }
    // フォロワー一覧
    public function followers(string $name)
    {
        $user = User::where('name', $name)->first();
        $followers = $user->followers->sortByDesc('created_at');
        $articles = $user->posts->sortByDesc('created_at');
        $day=Carbon::now();
        $sendtimes=Post::select('sendtime')->get();

        return view('users.followers',compact("user","followers","articles","day","sendtimes"));
        }

}

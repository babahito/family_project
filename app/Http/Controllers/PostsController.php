<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Validator;
use DB;
use App\User;
use App\Post;
    
    
    //=======================================================================
    class PostsController extends Controller
    {

        //ログインへのリダイレクト
        public function __construct()
        {
            $this->middleware('auth');
        }



        //表示部分
        public function index(Request $request)
        {
            $keyword = $request->get("search");

            $perPage = 25;
    
            if (!empty($keyword)) {
                // $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->orWhere("attribute_id", "LIKE", "%$keyword%")->orWhere("status", "LIKE", "%$keyword%")->paginate($perPage);
                $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%");
                
            } else {
                    $post = Post::where('user_id',Auth::user()->id)->paginate($perPage);              
            }    
            
            // $auths=Auth::user();

            return view("post.index", compact("post"));
        }

        public function create()
        {
            return view("post.create");
        }
    

        public function store(Request $request)
        {
            $this->validate($request, [
				"title" => "nullable", //string('title')->nullable()
				"body" => "nullable", //text('body')->nullable()
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"photo" => "nullable", //string('photo')->nullable()
				"attribute_id" => "required|integer", //integer('attribute_id')
				"status" => "required|integer", //integer('status')
				"sendtime" => "required|date", //integer('status')

            ]);
            
            // ====画像ファイルの保存=====
            $validator = Validator::make($request->all(), [
                'photo' => 'required|max:5000' //動画の容量を決める->5MB
            ]);

            //バリデーション:エラー
            if ($validator->fails()) {
                return redirect()->back()
                ->withInput()
                ->withErrors($validator);//バリデーションの内容を返しながら、前ページに戻る
            }

            // ================画像保存======================
            $image = $request->file('photo');
            
            $disk = Storage::disk('local');
            
            $path = $disk->put('public' ,$image);
            // ファイル名のみ
            $filename = pathinfo($path,  PATHINFO_BASENAME);

            $requestData = $request->all();
            Post::create([
                'photo' => $filename,
           
                'title'=>$request->title,
                'body'=>$request->body,
                'user_id'=>Auth::user()->id,
                'attribute_id'=>$request->attribute_id,
                'status'=>$request->status,
                'sendtime'=>$request->sendtime,
                ]);
            return redirect("post")->with("flash_message", "user_detail added!");
            // ============================================
            }
    

        public function show($id)
        {

            $posts=Post::find($id);
            // dd($id);
            return view("post.show", compact("posts"));
        }
    

        public function edit($id)
        {
            $post = Post::findOrFail($id);
    
            return view("post.edit", compact("post"));
        }
    

        public function update(Request $request, $id)
        {
            $this->validate($request, [
				"title" => "nullable", //string('title')->nullable()
				"body" => "nullable", //text('body')->nullable()
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"photo" => "nullable", //string('photo')->nullable()
				"attribute_id" => "required|integer", //integer('attribute_id')
				"status" => "required|integer", //integer('status')

            ]);
            $requestData = $request->all();
            
            $post = Post::findOrFail($id);
            $post->update($requestData);
    
            return redirect("post")->with("flash_message", "post updated!");
        }
    

        public function destroy($id)
        {
            Post::destroy($id);
    
            return redirect("post")->with("flash_message", "post deleted!");
        }


    
    }
    //=======================================================================
    
    
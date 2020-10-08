<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Validator;
use DB;
use App\User;
use App\UserDetail;
use App\Post;
use Carbon\Carbon;
// 画像加工用
use Image;
use InterventionImage;
    
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

            $perPage = 5;
    
            if (!empty($keyword)) {
                $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->orWhere("attribute_id", "LIKE", "%$keyword%")->orWhere("status", "LIKE", "%$keyword%");
                // $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%");
                
            } else {
                    $post = Post::where('user_id',Auth::user()->id)->paginate($perPage); 

                    
                   
                               
            }   
            
            $user_detail = UserDetail::where('user_id',Auth::user()->id)->paginate($perPage);     
            $auth=Auth::user();

            //現在時刻
            $day=Carbon::now();
            $sendtimes=Post::select('sendtime')->get();

            return view("post.index", compact("post","auth","user_detail","day","sendtimes"));
        }

        public function create(Request $request)
        {
            $perPage = 25;
            $post = Post::where('user_id',Auth::user()->id)->orderBy('sendtime','desc')->paginate($perPage);  
            $user_detail = UserDetail::where('user_id',Auth::user()->id);  
           
           
            $auth=Auth::user();
            $users=User::get();

            $tests=Post::select()->join('users','users.id','=','posts.attribute_id')->where('user_id',Auth::user()->id)
                        ->get();
            
            //現在時刻
            $day=Carbon::now();
            $sendtimes=Post::select('sendtime')->get();

            // dd($tests);
            // 送る方のユーザーselect
            $clients=User::select('id','name')->get();
            $client_id_loop = $clients->pluck('name','id');
            return view("post.create",compact("post","auth","user_detail",'client_id_loop','users','day','tests','sendtimes'));
        }
    

        public function store(Request $request)
        {
            $this->validate($request, [
				"title" => "nullable", //string('title')->nullable()
				"body" => "nullable", //text('body')->nullable()
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"photo" => "nullable", //string('photo')->nullable()
				"attribute_id" => "integer", //integer('attribute_id')
				"status" => "integer", //integer('status')
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
            // $image = $request->file('photo');
            // $disk = Storage::disk('local');
            // $path = $disk->put('public' ,$image);
            // $filename = pathinfo($path,  PATHINFO_BASENAME);
            // ==============================================



            $image = base64_encode(file_get_contents($request->photo));
           
            $requestData = $request->all();
            
            Post::create([
                'title'=>$request->title,
                'body'=>$request->body,
                'user_id'=>Auth::user()->id,
                'photo' => $image,
                'attribute_id'=>$request->attribute_id,
                'status'=>$request->status,
                'sendtime'=>$request->sendtime,
                ]);
                
            return redirect("post")->with("flash_message", "user_detail added!");
            // ============================================
        }





                    // public function store(Request $request)
                    // {
                    //     $this->validate($request, [
                    // 		"title" => "nullable", //string('title')->nullable()
                    // 		"body" => "nullable", //text('body')->nullable()
                    // 		"user_id" => "nullable|integer", //integer('user_id')->nullable()
                    // 		"photo" => "nullable", //string('photo')->nullable()
                    // 		"attribute_id" => "integer", //integer('attribute_id')
                    // 		"status" => "integer", //integer('status')
                    // 		"sendtime" => "required|date", //integer('status')

                    //     ]);
                        
            
            // ====画像ファイルの保存=====
                        // $validator = Validator::make($request->all(), [
                        //     'photo' => 'required|max:5000' //動画の容量を決める->5MB
                        // ]);
                
                        // //バリデーション:エラー
                        // if ($validator->fails()) {
                        //     return redirect()->back()
                        //     ->withInput()
                        //     ->withErrors($validator);//バリデーションの内容を返しながら、前ページに戻る
                        // }

            // ================画像保存(S3)======================
            // $image = $request->file('photo');
            // $disk = Storage::disk('local');
            // $path = $disk->put('public' ,$image );
            // $filename = pathinfo($path,  PATHINFO_BASENAME);
            // ============================================

                        // $image = base64_encode(file_get_contents($request->photo->getRealPath()));
                        // $requestData = $request->all();
                        // Post::create([
                        //     'title'=>$request->title,
                        //     'body'=>$request->body,
                        //     'user_id'=>Auth::user()->id,
                        //     'photo' => $image,
                        //     'attribute_id'=>$request->attribute_id,
                        //     'status'=>$request->status,
                        //     'sendtime'=>$request->sendtime,
                        //     ]);
                        // return redirect("post")->with("flash_message", "user_detail added!");
                        // // ============================================


            


                        // }
    
  


        public function show($id)
        {
            $item=Post::find($id);

            
            //現在時刻
            $day=Carbon::now();
            $sendtimes=Post::select('sendtime')->get();

            return view("post.show", compact("item","day","sendtimes"));
        }
    
        //---------いいねボタン用------
        public function like(Request $request, Post $item){

            $item->likes()->detach($request->user()->id);
            $item->likes()->attach($request->user()->id);
            return [
                'id'=>$item->id,
                'countLikes'=>$item->count_likes,
            ];

        }

        public function unlike(Request $request, Post $item){
        
            $item->likes()->detach($request->user()->id);
   
            return [
                'id'=>$item->id,
                'countLikes'=>$item->count_likes
            ];
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
				"attribute_id" => "nullable|integer", //integer('attribute_id')
				"status" => "nullable|integer", //integer('status')

            ]);
            $requestData = $request->all();
            
            $post = Post::findOrFail($id);
            $post->update($requestData);
            
            $users=User::get();


    
            return redirect("post")->with("flash_message", "post updated!");
        }
    

        public function destroy($id)
        {
            Post::destroy($id);
    
            return redirect("post")->with("flash_message", "post deleted!");
        }


    
    }
    //=======================================================================
    
    
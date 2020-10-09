<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Auth;
use Validator;
use DB;
use App\User;
use App\UserDetail;
    
    //=======================================================================
    class UserDetailsController extends Controller
    {
     
        //ログインしてないとログインページにリダイレクト
        public function __construct()
        {
            $this->middleware('auth');
        }

        public function index(Request $request)
        {
            $keyword = $request->get("search");
            $perPage = 25;
            $auth = Auth::user();
   

            dd($users);
            if (!empty($keyword)) {
                $user_detail = UserDetail::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                $user_detail = UserDetail::where('user_id',Auth::user()->id)->paginate($perPage);   
                   
            }          
            return view("user_detail.index", [ 'auth' => $auth ,'user_detail'=>$user_detail,'users'=>$users]);
            
        }
    
      
        public function create()
        {
            return view("user_detail.create");
        }
    
   
        public function store(Request $request)
        {
            $this->validate($request, [
				"user_id" => "nullable|integer", //integer('user_id')
				"photo" => "required", //string('photo')->nullable()
                "birthday" => "date", //date('birthday')->nullable()
                "comment" => "string", //string('comment')->nullable()

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
            // // ファイル名のみ
            // $filename = pathinfo($path,  PATHINFO_BASENAME);

            // =============================================-

            $image = base64_encode(file_get_contents($request->photo));

            $requestData = $request->all();
            UserDetail::create([
                'user_id'=>Auth::user()->id,
                'photo' => $image,
                'birthday'=>$request->birthday,
                'comment'=>$request->comment,
                ]);
            return redirect("post")->with("flash_message", "user_detail added!");
            // ============================================
        }
    
     
        public function show($id)
        {
            $user=User::find($id);
            $user_detail = UserDetail::findOrFail($id);
            $auth = Auth::user();
            return view("user_detail.show", compact("user",'user_detail',));
        }
    

        public function edit($id)
        {
            $user_dd = UserDetail::where('user_id',Auth::user()->id);
            $user_detail = UserDetail::findOrFail($id);
    
            return view("user_detail.edit", compact("user_detail",'user_dd'));
        }
    

        public function update(Request $request, $id)
        {
            $this->validate($request, [
				"user_id" => "required|integer", //integer('user_id')

                "birthday" => "nullable|date", //date('birthday')->nullable()
                "comment" => "nullable", //string('comment')->nullable()

            ]);
            



            $requestData = $request->all();
            
            $user_detail = UserDetail::findOrFail($id);
             $user_detail->update($requestData);

            return redirect("user_detail")->with("flash_message", "user_detail updated!");
        }
    

        public function destroy($id)
        {
            UserDetail::destroy($id);
    
            return redirect("user_detail")->with("flash_message", "user_detail deleted!");
        }


    }
    //=======================================================================
    

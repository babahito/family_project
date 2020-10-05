<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Storage;
use Validator;
use DB;
use App\User;
use App\UserDetail;
use App\Kazoku;
use App\Kazokupost;
use App\Post;
use Carbon\Carbon;
    

class KazokupostsController extends Controller
{
    //

    public function index(Request $request)
    {
        $keyword = $request->get("search");
        $perPage = 25;

        if (!empty($keyword)) {
            $kazokupost = Kazokupost::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->paginate($perPage);
        } else {
                $kazokuposts = Kazokupost::paginate($perPage);     
                
                
                $auth=Auth::user();

                //現在時刻
                $day=Carbon::now();
                $sendtimes=Post::select('sendtime')->get();
                

                
    
        }          
        return view("kazokupost.index", compact("kazokuposts","day","sendtimes"));
    }

    public function create(Request $request)
    {
                        // セッション受け取り
                        
        return view("kazokupost.create");
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "nullable", //string('title')->nullable()
            "body" => "nullable", //text('body')->nullable()
            "user_id" => "nullable|integer", //integer('user_id')->nullable()
            "kazokupost_id" => "nullable|integer", //integer('user_id')->nullable()
            "photo" => "nullable", //string('photo')->nullable()
            "attribute_id" => "integer", //integer('attribute_id')
            "status" => "integer", //integer('status')
            "sendtime" => "required|date", //integer('status')

        ]);
        
        // ====画像ファイルの保存=====
                $validator = Validator::make($request->all(), [
                    'photo' => 'max:5000' //動画の容量を決める->5MB
                ]);

                // //バリデーション:エラー
                if ($validator->fails()) {
                    return redirect()->back()
                    ->withInput()
                    ->withErrors($validator);//バリデーションの内容を返しながら、前ページに戻る
                }
        // ===========セッションID受け取り(家族ID)
            $id = $request->session()->get('id');
        // ================画像保存(S3)======================
                // $image = $request->file('photo');
                // $disk = Storage::disk('local');
                // $path = $disk->put('public' ,$image );
                // // ファイル名のみ
                // $filename = pathinfo($path,  PATHINFO_BASENAME);

        $image = base64_encode(file_get_contents($request->photo));
        $requestData = $request->all();
        Kazokupost::create([
       
            'title'=>$request->title,
            'body'=>$request->body,
            'photo' => $image,
            'user_id'=>Auth::user()->id,
            'kazokupost_id'=>$request->session()->get('id'),
            'attribute_id'=>$request->attribute_id,
            'status'=>$request->status,
            'sendtime'=>$request->sendtime,
            ]);
        return redirect("kazoku")->with("flash_message", "user_detail added!");

        }


        public function show(Request $request,$id)
        {
            $kazokupost = Kazokupost::findOrFail($id);
     

     
             //現在時刻
             $day=Carbon::now();
             // $sendtimes=Post::select('sendtime')->get();
                       // return session()->get('email');
            return view("kazokupost.show",compact('kazokupost','day'));
        }

        public function edit($id)
        {
            $kazokupost = Kazokupost::findOrFail($id);
     
            return view("kazokupost.edit", compact("kazokupost"));
        }
     
     
        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'title'=>$request->title,
                'body'=>$request->body,

                'user_id'=>Auth::user()->id,
                'kazokupost_id'=>$request->session()->get('id'),
                'attribute_id'=>$request->attribute_id,
                'status'=>$request->status,
                'sendtime'=>$request->sendtime,
     
            ]);
            $requestData = $request->all();
            
            $kazokupost = Kazokupost::findOrFail($id);
            $kazokupost->update($requestData);
     
            return redirect("kazokupost")->with("flash_message", "mail_received updated!");
        }


        // ===削除=====
        public function destroy($id)
        {
            Kazokupost::destroy($id);
     
            return redirect("kazoku")->with("flash_message", "mail_received deleted!");
        }

}

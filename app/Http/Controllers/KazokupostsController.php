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
// 画像加工用
use Image;
use InterventionImage;
    

class KazokupostsController extends Controller
{
    //

    public function index(Request $request)
    {

                $tags = Kazokupost::find(1);
                // dd($tags);          
     
        return view("kazokupost.index", compact("tags"));
    }



    public function create()
    {
        return view("kazokupost.create");
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            "title" => "nullable", //string('title')->nullable()
            "body" => "nullable", //text('body')->nullable()
            "user_id" => "nullable|integer", //integer('user_id')->nullable()
            // "photo" => "nullable", //string('photo')->nullable()
            "attribute_id" => "integer", //integer('attribute_id')
            "status" => "integer", //integer('status')
            "sendtime" => "required|date", //integer('status')

        ]);
        
        // ====画像ファイルの保存=====
                // $validator = Validator::make($request->all(), [
                //     'photo' => 'max:5000' //動画の容量を決める->5MB
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
                // // ファイル名のみ
                // $filename = pathinfo($path,  PATHINFO_BASENAME);


        $requestData = $request->all();
        Kazokupost::create([
            // 'photo' => $filename,
       
            'title'=>$request->title,
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
            'attribute_id'=>$request->attribute_id,
            'status'=>$request->status,
            'sendtime'=>$request->sendtime,
            ]);
        return redirect("kazokupost")->with("flash_message", "user_detail added!");

        }

}

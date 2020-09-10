<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Auth;
use DB;
use Storage;
use Validator;
use App\Kazoku;
use App\User;

class KazokusController extends Controller
{

   public function index(Request $request)
   {
       $keyword = $request->get("search");
       $perPage = 25;

       if (!empty($keyword)) {
        //    $mail_received = MailReceived::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("received_user_id", "LIKE", "%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->orWhere("received_life", "LIKE", "%$keyword%")->paginate($perPage);
       } else {
               $kazokus = Kazoku::all();         
                 
       }          
       return view("kazoku.index", compact("kazokus"));
   }


   public function create()
   {
       return view("kazoku.create");
   }


   public function store(Request $request)
   {
       $this->validate($request, [
           "user_id" => "nullable|integer", //integer('user_id')
           "family_name" => "nullable|string", //integer('received_user_id')
           "famil_date" => "nullable|date", //date('received_day')
           "status" => "nullable|integer", //integer('received_life')
           "history" => "nullable|string", //integer('received_user_id')

       ]);
            // ====画像ファイルの保存=====
            $validator = Validator::make($request->all(), [
                'photo' => 'nullable|max:5000' //動画の容量を決める->5MB
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

            // $requestData = $request->all();
            Kazoku::create([
                'user_id'=>Auth::user()->id,
               'photo' => $filename,
          
               'family_name'=>$request->family_name,
               'family_date'=>$request->family_date,

               'status'=>$request->status,
               'history'=>$request->history,
               ]);
            

       return redirect("kazoku")->with("flash_message", "mail_received added!");
   }

   public function show($id)
   {
       $kazoku = Kazoku::findOrFail($id);
       return view("kazoku.show");
   }


   public function edit($id)
   {
       $kazoku = Kazoku::findOrFail($id);

       return view("kazoku.edit", compact("kazoku"));
   }


   public function update(Request $request, $id)
   {
    //    $this->validate($request, [
    //        "user_id" => "required|integer", //integer('user_id')
    //        "received_user_id" => "required|integer", //integer('received_user_id')
    //        "post_id" => "required|integer", //integer('post_id')
    //        "received_day" => "required|date", //date('received_day')
    //        "received_life" => "required|integer", //integer('received_life')

    //    ]);
    //    $requestData = $request->all();
       
    //    $mail_received = MailReceived::findOrFail($id);
    //    $mail_received->update($requestData);

    //    return redirect("mail_received")->with("flash_message", "mail_received updated!");
   }

   public function destroy($id)
   {
    //    MailReceived::destroy($id);

    //    return redirect("mail_received")->with("flash_message", "mail_received deleted!");
   }

//  参加ボタンが押されたとき、一回user-idを削除して、つけなおす⇒user_idとカウントの数を連想配列の形で渡す
   public function like(Request $request,Kazoku $kazoku)
   {
       $kazoku->kazoku_user()->detach($request->user()->id);
       $kazoku->kazoku_user()->attach($request->user()->id);
       return [
           'id'=>$kazoku->id,
           'countKazokus'=>$kazoku->count_kazokus,
       ];
   }

//  参加ボタンをはなした時、一回user-idを削除して、つけなおす⇒user_idとカウントの数を連想配列の形で渡す
public function unlike(Request $request,Kazoku $kazoku)
{
    $kazoku->kazoku_user()->detach($request->user()->id);

    return [
        'id'=>$kazoku->id,
        'countKazokus'=>$kazoku->count_kazokus,
    ];
}


}
//=======================================================================


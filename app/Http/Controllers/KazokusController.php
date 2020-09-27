<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Test;


use Auth;
use DB;
use Storage;
use Validator;
use App\Kazoku;
use App\User;
use App\Jobs\TestJob;

//追加した関数にRequestがあるので追記
//作成したメール関数用のファイルを追記
use App\Notifications\CustomVerify;
//メール送信時に使うので追記
use Notification;



class KazokusController extends Controller
{

   public function index(Request $request)
   {
       $keyword = $request->get("search");
       $perPage = 25;

       if (!empty($keyword)) {
            $kazokus = Kazoku::where("id","LIKE","%$keyword%")->orWhere("family_name", "LIKE", "%$keyword%")->paginate($perPage);
        
       } else {
        $user_id = Auth::id();
        $kazokus=User::find($user_id)->kazokus()->get();
        $kazokuadmin = Kazoku::where('user_id',Auth::user()->id)->get(); 
        // $kazokus=$kazokujoin->union($kazokuadmin)->get();

        // dd($kazokus);
            // $user = Kazoku::where('family_name', $family_name)->first();
            // dd($user);
            // $aa=$kazokus->kazoku_user->sortByDesc('created_at');
            // dd($aa);
            
            
   
                 
       }          
       return view("kazoku.index", compact("kazokus","kazokuadmin"));
   }


   public function create()
   {
       return view("kazoku.create");
   }

   public function thank(){

            //    メール送信
            $auth=Auth::user()->name;
            $family_name=Kazoku()->family_name;
            $users=User::get();
               Mail::to($users)->send(new Test($auth));    

            return view("kazoku.thank");
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

            $requestData = $request->all();
            $kazoku=Kazoku::create([
                'user_id'=>Auth::user()->id,
               'photo' => $filename,
          
               'family_name'=>$request->family_name,
               'family_date'=>$request->family_date,

               'status'=>$request->status,
               'history'=>$request->history,
               ]);
                        //    メール送信
            // $auth=Auth::user()->name;
            // $family_name=Kazoku::get();
            // dd($family_name);
            // $users=User::get();
            //    Mail::to($users)->send(new Test($auth,$family_name));    


       return redirect("kazoku")->with("flash_message", "mail_received added!");
   }

   

   public function show($id)
   {
       $kazoku = Kazoku::findOrFail($id);
       return view("kazoku.show",compact('kazoku'));
   }


   public function edit($id)
   {
       $kazoku = Kazoku::findOrFail($id);

       return view("kazoku.edit", compact("kazoku"));
   }


   public function update(Request $request, $id)
   {
       $this->validate($request, [
        "user_id" => "nullable|integer", //integer('user_id')
        "family_name" => "nullable|string", //integer('received_user_id')
        "famil_date" => "nullable|date", //date('received_day')
        "status" => "nullable|integer", //integer('received_life')
        "history" => "nullable|string", //integer('received_user_id')

       ]);
       $requestData = $request->all();
       
       $kazoku = Kazoku::findOrFail($id);
       $kazoku->update($requestData);

       return redirect("kazoku")->with("flash_message", "mail_received updated!");
   }

   public function destroy($id)
   {
       Kazoku::destroy($id);

       return redirect("kazoku")->with("flash_message", "mail_received deleted!");
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


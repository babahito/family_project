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
use App\Kazokupost;
use Carbon\Carbon;

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
        $kk=Kazoku::get();
        
        $kazokuadmin = Kazoku::where('user_id',Auth::user()->id)->get(); 
        // $kazokus=$kazokujoin->union($kazokuadmin)->get();

        // dd($kazokus);
            // $user = Kazoku::where('family_name', $family_name)->first();
            // dd($user);
            // $aa=$kazokus->kazoku_user->sortByDesc('created_at');
            // dd($aa);
            
 
                 
       }          
       return view("kazoku.index", compact("kazokus","kazokuadmin","kk"));
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
           "family_name" => "required|string", //integer('received_user_id')
           "history" => "required|string", //integer('received_user_id')
           "photo" => "required",
           "famil_date" => "nullable|date", //date('received_day')
           "status" => "nullable|integer", //integer('received_life')


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
            $file=$request->file('photo');
            $image = Storage::disk('s3')->put('/post',$file, 'public');
            $requestData = $request->all();
            $kazoku=Kazoku::create([
                'user_id'=>Auth::user()->id,
                'photo' => $image,
               'family_name'=>$request->family_name,
               'family_date'=>$request->family_date,

               'status'=>$request->status,
               'history'=>$request->history,
               ]);
      
       return redirect("kazoku")->with("flash_message", "mail_received added!");
   }

   

   public function show(Request $request,$id)
   {
       $kazoku = Kazoku::findOrFail($id);

        // セッションID(家族IDの取得)
        $kazoku_id=$request->session()->put('id', $id);

        $kazokuposts=Kazokupost::where('kazokupost_id','=',$id)->get();

        //現在時刻
        $day=Carbon::now();
        // $sendtimes=Post::select('sendtime')->get();
                  // return session()->get('email');
       return view("kazoku.show",compact('kazoku',"id","kazokuposts","day"));
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


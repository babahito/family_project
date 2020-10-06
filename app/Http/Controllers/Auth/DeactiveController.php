<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DeactiveController extends Controller
{
    //
    
             public function __construct()
             {
                 $this->middleware('auth');
             }
            //  退会処理（表示）
             public function showDeactiveForm()
            {
               return view('auth\deactive');
             }
            //  実際の退会処理
             public function deactive()
             {
               User::find(Auth::id())->delete();
              return redirect('/');
             }
}

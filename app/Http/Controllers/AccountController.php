<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
// 
class AccountController extends Controller
{
    //ユーザーソフトデリート用
    public function deleteData(Request $request)
    {
      $user = Users::find($request->input('id'));
      $user->delete();
    }
}

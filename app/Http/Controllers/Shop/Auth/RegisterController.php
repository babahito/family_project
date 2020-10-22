<?php

namespace App\Http\Controllers\Shop\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Shop;
use Auth;

class RegisterController extends Controller
{
    //
    use RegistersUsers;

    // 登録後のリダイレクト先を定義
    protected $redirectTo = 'shop/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return Shop::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
     //新規登録ページ（追記)
    public function showRegistrationForm()
    {
        return view('shops/auth/register');
    }

     //追記（ガードの名前はここでつける)
    protected function guard()
    {
        return Auth::guard('shop');
    }


}

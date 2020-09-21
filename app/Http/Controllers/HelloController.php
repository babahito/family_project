<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use App\Mail\HelloMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Auth;
use App\Kazoku;
use App\User;

class HelloController extends Controller
{
    public function create()
    {
        $auth=Auth::user();
        // dd($tests);
        // 送る方のユーザーselect
        $clients=User::select('id','name')->get();
        $client_id_loop = $clients->pluck('name','id');

        return view('hello.create',compact('auth','client_id_loop'));
    }

    public function send(HelloRequest $request)
    {
        $auth=Auth::user();
        $urls = [
            'hi' => URL::temporarySignedRoute(
                'hello.hi',
                now()->addMinutes(1),  // 1分間だけ有効
                ['from' => $request->name=$auth->name]
            ),
            'bye' => URL::temporarySignedRoute(
                'hello.bye',
                now()->addMinutes(1),  // 1分間だけ有効
                ['from' => $request->name=$auth->name]
            ),
        ];
        $mail = new HelloMail($request, $urls);
        Mail::to($request->email)->send($mail);
        return view('hello/mail/find');
    }

    public function hi(Request $request)
    {
        $perPage = 25;
        $kazokus = Kazoku::paginate($perPage); 
        // リンクの検証
        if (!$request->hasValidSignature()) {
            return redirect()->route('hello.invalid');
        }
        return view('kazoku.index',compact('kazokus'));
    }

    public function bye(Request $request)
    {
        // リンクの検証
        if (!$request->hasValidSignature()) {
            return redirect()->route('hello.invalid');
        }
        return 'bye';
    }

    public function invalid()
    {
        return 'invalid';
    }
}
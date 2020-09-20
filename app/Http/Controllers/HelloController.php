<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use App\Mail\HelloMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class HelloController extends Controller
{
    public function create()
    {
        return view('hello.create');
    }

    public function send(HelloRequest $request)
    {
        $urls = [
            'hi' => URL::temporarySignedRoute(
                'hello.hi',
                now()->addMinutes(1),  // 1分間だけ有効
                ['from' => $request->name]
            ),
            'bye' => URL::temporarySignedRoute(
                'hello.bye',
                now()->addMinutes(1),  // 1分間だけ有効
                ['from' => $request->name]
            ),
        ];
        $mail = new HelloMail($request, $urls);
        Mail::to($request->email)->send($mail);
        return '送信完了しました。';
    }

    public function hi(Request $request)
    {
        // リンクの検証
        if (!$request->hasValidSignature()) {
            return redirect()->route('hello.invalid');
        }
        return '参加ありがとうございます';
    }

    public function bye(Request $request)
    {
        // リンクの検証
        if (!$request->hasValidSignature()) {
            return redirect()->route('hello.invalid');
        }
        return '家族にはならないです';
    }

    public function invalid()
    {
        return 'invalid';
    }
}
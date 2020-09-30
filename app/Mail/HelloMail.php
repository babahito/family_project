<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Auth;

class HelloMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($request, $urls)
    {
        $this->request = $request;
        $this->urls = $urls;
    }

    public function build()
    {
        return $this
            ->subject($this->request->name.'さんからメールが届きました')
            ->view('hello.mail.send')
            ->with([
                'urls' => $this->urls,
                'text' => $this->request->text,
                'send_name'=>$this->request->send_name,
                'id'=>$this->request->id,
                'kazoku_id'=>$this->request->kazoku_id,
            ]);
    }
}
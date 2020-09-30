<?php

namespace App\Mail;

use App\User;
use App\Kazoku;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateKazoku extends Mailable
{
    use Queueable, SerializesModels;


    public $user;
    public $kazoku;


    public function __construct(User $user,Kazoku $kazoku)
    {
        //
        $this->user=$user;
        $this->kazoku=$kazoku;
    }


    public function build()
    {
        return $this
        ->subject('コメントありがとうございます')
        ->view('emails.posts');
    }
}

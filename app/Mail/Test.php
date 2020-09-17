<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Test extends Mailable
{
    use Queueable, SerializesModels;

    public $auth;
    public $family_name;


    public function __construct($auth,$family_name)
    {
        //
        $this->auth=$auth;
        $this->family_name=$family_name;

    }


    public function build()
    {
        return $this->view('emails.test');
    }
}

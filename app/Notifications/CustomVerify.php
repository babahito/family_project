<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomVerify extends Notification
{
    use Queueable;

    // USERモデルから飛んでくる変数をここでキャッチ
    protected $user;

    //  メールを送信するために$userを受け取る
    public function __construct($user)
    {
        //左の$this->userでこのクラスのなかで使えるようになる
        $this->user=$user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->from(config('mail.from.address'))
            ->subject('FamilyNOTE：新規登録完了')
            // カスタム用のブレードを指定し、変数を渡す
            ->markdown('emails.custom_verify',['user'=> $this->user]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

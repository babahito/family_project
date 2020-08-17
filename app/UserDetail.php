<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    //
    protected $guarded = ["id"];
    

    // 1対1(従テーブル：ユーザーとユーザー詳細）
    public function user(){
        return $this->belongsTo('App\User');
    }
}


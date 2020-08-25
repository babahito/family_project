<?php

namespace App;
use Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UserDetail extends Model
{
    //
    protected $guarded = ["id"];
    

    // 1対1(従テーブル：ユーザーとユーザー詳細）
    public function user(){
        return $this->belongsTo('App\User');
    }

    // 多対多（ユーザーと記事の中間テーブル））
    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }
}


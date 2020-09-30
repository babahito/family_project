<?php

namespace App;
use App\Auth;
use App\Post;
use App\UserDetail;
use App\Follow;

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
    // 1対多(従テーブル：ユーザー詳細とフォローID）
    public function follow(){
        return $this->hasMany('App\Follow');
    }
    // 1対多(ユーザーとノート記事）
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // 多対多（ユーザーと記事の中間テーブル））
    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    // 多対多（記事とユーザー詳細）
    // public function deposts(): BelongsToMany{
    //     return $this->belongsToMany('App\Post', 'deposts')->withTimestamps();
    // }

}


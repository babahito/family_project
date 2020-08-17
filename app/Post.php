<?php

namespace App;
use App\User;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $guarded = ["id"];
    
        // 1対多(従テーブル：ユーザーとノート記事）
        public function user(){
            return $this->belongsTo('App\User');
        }

}


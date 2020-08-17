<?php

namespace App;
use App\User;
use App\Post;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    //
    protected $guarded = ["id"];
    
        // 1対多(従テーブル：ユーザーとノート記事）
        public function user(){
            return $this->belongsTo('App\User');
        }

        // 多対多（記事といいねボタン）
        public function likes(){
            return $this->belongsToMany('App\User','likes')->withTimestamps();
        }

        // ログインユーザーがいいね済みかどうか（isLikeByメソッドの作成）
        public function isLikedBy(?User $user): bool //?はnull許可(nullableな型宣言)Userモデル
        {
            return $user
            //$userが空でなければ、(bool)は型キャスト、tureかfalsewo
            ? (bool)$this->likes->where('id', $user->id)->count()
            //$userが空
            : false;
        }

}


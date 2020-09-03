<?php

namespace App;
use App\User;

use App\Like;
use App\UserDetail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    //
    protected $guarded = ["id"];
    
        // 1対多(従テーブル：ユーザーとノート記事）
        public function user(){
            return $this->belongsTo('App\User');
        }
        // １対多(従テーブル：ユーザー詳細とノート記事）
        public function user_detail(){
            return $this->belongsToMany('App\UserDetail');
        }

        // 多対多（記事といいねボタン）
        public function likes(): BelongsToMany{
            return $this->belongsToMany('App\User', 'likes')->withTimestamps();

        }

        // 多対多（記事とユーザー詳細）
        // public function deposts(): BelongsToMany{
        //     return $this->belongsToMany('App\UserDetail', 'deposts')->withTimestamps();
        // }

        // ログインユーザーがいいね済みかどうか（isLikeByメソッドの作成）
        public function isLikedBy(?User $user): bool //?はnull許可(nullableな型宣言)Userモデル
        {
            return $user
            
            //$userが空でなければ、(bool)は型キャスト、tureかfalsewo
            ? (bool)$this->likes->where('id', $user->id)->count()
            
            //$userが空
            : false;
        }

        public function getCountLikesAttribute(): int
        {
            return $this->likes->count();
        }
}


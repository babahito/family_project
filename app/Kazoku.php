<?php

namespace App;
use App\Auth;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Kazoku extends Model
{
    // 割り当て許可
    //https://laraweb.net/knowledge/2324/
    protected $guarded = ["id"];



    // ------------------------------------------------
    // -----------------家族グループ--------------------
    // ------------------------------------------------
    // 多対多(ユーザーと家族:中間テーブルkazoku_ueser）
    public function kazoku_user(){
        return $this->belongsToMany('App\User','kazoku_user');
    }

    // 家族テーブルと紐づくユーザーがいるかどうか（と、その数）
    public function isKazokuBy(?User $user): bool
    {
     //$userがUserモデルを利用していると宣言？はnul許可と同じ
        return $user
            ?(bool)$this->kazoku_user->where('id',$user->id)->count()
            :false;
    }

    // 家族テーブルに紐づくユーザーの数を取得（スネルケースで取得可能count_kazokus）
    public function getCountKazokusAttribute(){
        return $this->kazoku_user->count();
    }


}

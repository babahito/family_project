<?php

namespace App;
use Auth;
use User;

use Illuminate\Database\Eloquent\Model;

class Kazoku extends Model
{
    // 割り当て許可
    //https://laraweb.net/knowledge/2324/
    protected $guarded = ["id"];


    // ------------------------------------------------
    // -----------------家族グループ--------------------
    // ------------------------------------------------
    // 多対多(ユーザーと家族）
    public function users(){
        return $this->belongsToMany('App\User');
    }
}

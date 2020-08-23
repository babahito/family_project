<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    protected $table = 'todos';  //モデルとテーブルを紐づけ
    protected $primaryKey = 'id'; //プライマリーキーを id に紐づけ
    public $timestamps = false; //タイムスタンプを無効にする
}

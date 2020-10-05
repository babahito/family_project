<?php

namespace App;
use App\Auth;
use App\User;
use App\Kazokupost;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // 家族と家族ノートとの多対多
    public function kazokuposts(): BelongsToMany{
        return $this->belongsToMany('App\Kazokupost','kposts');

    }




    // アクセサ（表示・非表示）


    const STATUS=[
        0 => [ 'label' => '非表示','class'=>'display:none;' ],
        1 => [ 'label' => '表示' ,'class'=>'diaplay:block'],
    ];

    // ラベルを定義
    public function getStatusLabelAttribute()
    {
        // 状態値
        $status = $this->attributes['status'];

        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }

        return self::STATUS[$status]['label'];
    }



// クラスを定義
    public function getStatusClassAttribute(){
        // 状態値
        $status = $this->attributes['status'];
        // 定義されていなければ空文字を返す
        if (!isset(self::STATUS[$status])) {
            return '';
        }
        return self::STATUS[$status]['class'];
    }

}

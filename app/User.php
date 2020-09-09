<?php

namespace App;
use Auth;
use Post;
use UserDetail;
use Kazoku;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // 1対１(ユーザーとユーザー詳細紐づけ)
    public function user_detail(){
        return $this->hasOne('App\UserDetail');
    }

    // 1対多(ユーザーとノート記事）
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // ------------------------------------------------
    // -----------------いいね機能----------------------
    // ------------------------------------------------
    // いいねした記事とユーザーのリレーション
    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Post', 'likes')->withTimestamps();
    }

 // ------------------------------------------------
    // -----------------家族グループ--------------------
    // ------------------------------------------------
    // 多対多(ユーザーと家族）
    public function kazokus(){
        return $this->belongsToMany('App\Kazoku');
    }

    // --------------------------------------------------
    // -----------フォロー&フォロワー--------------------
    // --------------------------------------------------
    // 多対多（フォロー数）
    public function followers(){
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    // 多対多（フォロワー数）
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    // ユーザーがフォロー中かどうか
    public function isFollowedBy(?User $user): bool
    {
        return $user
        
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    //フォローの算出 
    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    // フォロワーの算出
    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }



}

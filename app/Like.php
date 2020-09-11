<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Like;
use App\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Like extends Model
{
    //
    protected $guarded = ["id"];
    
    public function post(){
        return $this->hasMany('App\Post');
    }

    public function user(){
        return $this->hasMany('App\User');
    }

}


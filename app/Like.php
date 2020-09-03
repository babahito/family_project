<?php

namespace App;
use App\User;
use App\Post;
use App\Like;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //
    protected $guarded = ["id"];
    
    // public function poslikes(): BelongsToMany{
    //     return $this->belongsToMany('App\Post')->withTimestamps();
        
    // }

}


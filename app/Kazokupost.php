<?php

namespace App;
use App\Auth;
use App\User;
use App\Kazoku;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Kazokupost extends Model
{
    //
    protected $guarded = ['id'];

        // 家族と家族ノートとの多対多
        public function kazoku(): BelongsToMany{
            return $this->belongsToMany('App\Kazoku','kposts');
    
        }

        public function user(){
            return $this->belongsTo('App\User');
        }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//認証で使う
use Illuminate\Foundation\Auth\User as Authenticatable; 

// 認証用で書き換える
class Shop extends Authenticatable
{
    //
    protected $fillable = [
        'name', 'email', 'password',
        ];

}

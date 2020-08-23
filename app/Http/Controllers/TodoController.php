<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //

    public function getTodos(){ //← 追記
        $todos = Todo::all();
        return $todos;
      }
}

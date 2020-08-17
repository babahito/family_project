<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $keyword = $request->get("search");
        $perPage = 25;

        if (!empty($keyword)) {
            $users = User::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->orWhere("email", "LIKE", "%$keyword%");
        } else {
            $users = User::all();             
        }    
        
        // $auths=Auth::user();

        return view("user.index", compact("users"));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
        return view('user.show', ['user' => $user]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Follow;
    
    //=======================================================================
    class FollowsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\View\View
         */
        public function index(Request $request)
        {
            $keyword = $request->get("search");
            $perPage = 25;
    
            if (!empty($keyword)) {
                $follow = Follow::where("id","LIKE","%$keyword%")->orWhere("follower_id", "LIKE", "%$keyword%")->orWhere("followee_id", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $follow = Follow::paginate($perPage);              
            }          
            return view("follow.index", compact("follow"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("follow.create");
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function store(Request $request)
        {
            $this->validate($request, [
				"follower_id" => "nullable|integer", //integer('follower_id')->nullable()
				"followee_id" => "nullable|integer", //integer('followee_id')->nullable()

            ]);
            $requestData = $request->all();
            
            Follow::create($requestData);
    
            return redirect("follow")->with("flash_message", "follow added!");
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function show($id)
        {
            $follow = Follow::findOrFail($id);
            return view("follow.show", compact("follow"));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function edit($id)
        {
            $follow = Follow::findOrFail($id);
    
            return view("follow.edit", compact("follow"));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  int  $id
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(Request $request, $id)
        {
            $this->validate($request, [
				"follower_id" => "nullable|integer", //integer('follower_id')->nullable()
				"followee_id" => "nullable|integer", //integer('followee_id')->nullable()

            ]);
            $requestData = $request->all();
            
            $follow = Follow::findOrFail($id);
            $follow->update($requestData);
    
            return redirect("follow")->with("flash_message", "follow updated!");
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function destroy($id)
        {
            Follow::destroy($id);
    
            return redirect("follow")->with("flash_message", "follow deleted!");
        }
    }
    //=======================================================================
    
    
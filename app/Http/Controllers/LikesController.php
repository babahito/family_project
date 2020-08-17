<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Like;
    
    //=======================================================================
    class LikesController extends Controller
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
                $like = Like::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $like = Like::paginate($perPage);              
            }          
            return view("like.index", compact("like"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("like.create");
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
				"user_id" => "required|integer", //integer('user_id')
				"post_id" => "required|integer", //integer('post_id')

            ]);
            $requestData = $request->all();
            
            Like::create($requestData);
    
            return redirect("like")->with("flash_message", "like added!");
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
            $like = Like::findOrFail($id);
            return view("like.show", compact("like"));
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
            $like = Like::findOrFail($id);
    
            return view("like.edit", compact("like"));
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
				"user_id" => "required|integer", //integer('user_id')
				"post_id" => "required|integer", //integer('post_id')

            ]);
            $requestData = $request->all();
            
            $like = Like::findOrFail($id);
            $like->update($requestData);
    
            return redirect("like")->with("flash_message", "like updated!");
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
            Like::destroy($id);
    
            return redirect("like")->with("flash_message", "like deleted!");
        }
    }
    //=======================================================================
    
    
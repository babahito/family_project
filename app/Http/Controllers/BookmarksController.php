<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Bookmark;
    
    //=======================================================================
    class BookmarksController extends Controller
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
                $bookmark = Bookmark::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $bookmark = Bookmark::paginate($perPage);              
            }          
            return view("bookmark.index", compact("bookmark"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("bookmark.create");
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
            
            Bookmark::create($requestData);
    
            return redirect("bookmark")->with("flash_message", "bookmark added!");
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
            $bookmark = Bookmark::findOrFail($id);
            return view("bookmark.show", compact("bookmark"));
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
            $bookmark = Bookmark::findOrFail($id);
    
            return view("bookmark.edit", compact("bookmark"));
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
            
            $bookmark = Bookmark::findOrFail($id);
            $bookmark->update($requestData);
    
            return redirect("bookmark")->with("flash_message", "bookmark updated!");
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
            Bookmark::destroy($id);
    
            return redirect("bookmark")->with("flash_message", "bookmark deleted!");
        }
    }
    //=======================================================================
    
    
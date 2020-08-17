<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Tag;
    
    //=======================================================================
    class TagsController extends Controller
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
                $tag = Tag::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $tag = Tag::paginate($perPage);              
            }          
            return view("tag.index", compact("tag"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("tag.create");
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
				"name" => "required", //string('name')

            ]);
            $requestData = $request->all();
            
            Tag::create($requestData);
    
            return redirect("tag")->with("flash_message", "tag added!");
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
            $tag = Tag::findOrFail($id);
            return view("tag.show", compact("tag"));
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
            $tag = Tag::findOrFail($id);
    
            return view("tag.edit", compact("tag"));
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
				"name" => "required", //string('name')

            ]);
            $requestData = $request->all();
            
            $tag = Tag::findOrFail($id);
            $tag->update($requestData);
    
            return redirect("tag")->with("flash_message", "tag updated!");
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
            Tag::destroy($id);
    
            return redirect("tag")->with("flash_message", "tag deleted!");
        }
    }
    //=======================================================================
    
    
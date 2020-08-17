<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\PostsTag;
    
    //=======================================================================
    class PostsTagsController extends Controller
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
                $posts_tag = PostsTag::where("id","LIKE","%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->orWhere("tag_id", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $posts_tag = PostsTag::paginate($perPage);              
            }          
            return view("posts_tag.index", compact("posts_tag"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("posts_tag.create");
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
				"post_id" => "required|integer", //integer('post_id')
				"tag_id" => "required|integer", //integer('tag_id')

            ]);
            $requestData = $request->all();
            
            PostsTag::create($requestData);
    
            return redirect("posts_tag")->with("flash_message", "posts_tag added!");
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
            $posts_tag = PostsTag::findOrFail($id);
            return view("posts_tag.show", compact("posts_tag"));
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
            $posts_tag = PostsTag::findOrFail($id);
    
            return view("posts_tag.edit", compact("posts_tag"));
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
				"post_id" => "required|integer", //integer('post_id')
				"tag_id" => "required|integer", //integer('tag_id')

            ]);
            $requestData = $request->all();
            
            $posts_tag = PostsTag::findOrFail($id);
            $posts_tag->update($requestData);
    
            return redirect("posts_tag")->with("flash_message", "posts_tag updated!");
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
            PostsTag::destroy($id);
    
            return redirect("posts_tag")->with("flash_message", "posts_tag deleted!");
        }
    }
    //=======================================================================
    
    
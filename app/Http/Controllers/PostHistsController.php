<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\PostHist;
    
    //=======================================================================
    class PostHistsController extends Controller
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
                $post_hist = PostHist::where("id","LIKE","%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->orWhere("rev_id", "LIKE", "%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $post_hist = PostHist::paginate($perPage);              
            }          
            return view("post_hist.index", compact("post_hist"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("post_hist.create");
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
				"rev_id" => "required|integer", //integer('rev_id')
				"title" => "required", //string('title')
				"body" => "required", //text('body')
				"photo" => "nullable", //string('photo')->nullable()

            ]);
            $requestData = $request->all();
            
            PostHist::create($requestData);
    
            return redirect("post_hist")->with("flash_message", "post_hist added!");
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
            $post_hist = PostHist::findOrFail($id);
            return view("post_hist.show", compact("post_hist"));
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
            $post_hist = PostHist::findOrFail($id);
    
            return view("post_hist.edit", compact("post_hist"));
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
				"rev_id" => "required|integer", //integer('rev_id')
				"title" => "required", //string('title')
				"body" => "required", //text('body')
				"photo" => "nullable", //string('photo')->nullable()

            ]);
            $requestData = $request->all();
            
            $post_hist = PostHist::findOrFail($id);
            $post_hist->update($requestData);
    
            return redirect("post_hist")->with("flash_message", "post_hist updated!");
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
            PostHist::destroy($id);
    
            return redirect("post_hist")->with("flash_message", "post_hist deleted!");
        }
    }
    //=======================================================================
    
    
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use Validate;
use DB;
use App\UserDetail;
use App\User;
use App\Post;

use Carbon\Carbon;
    //=======================================================================
    class FamilynotesController extends Controller
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
            $users=User::all();
            $user_details=UserDetail::all();
            // dd($user);
            if (!empty($keyword)) {
                $post = Post::where("id","LIKE","%$keyword%")->orWhere("title", "LIKE", "%$keyword%")->orWhere("body", "LIKE", "%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("photo", "LIKE", "%$keyword%")->paginate($perPage);
                
            } else {
                    $post = Post::paginate($perPage);  
                    
                    $sendtime=Post::select('sendtime')->get();
                    $datetime = Carbon::now();
                    
                    // $data = Carbon::now($sendtime)->year;
                    // $sendtime=Post::whereYear('sendtime','2020')->get();
                    // dd($sendtime);
                    
                               
            }          
            return view("family_note.index", compact("post","users","user_details"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("post.create");
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
				"title" => "nullable", //string('title')->nullable()
				"body" => "nullable", //text('body')->nullable()
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"photo" => "nullable", //string('photo')->nullable()

            ]);
            $requestData = $request->all();
            
            Post::create($requestData);
    
            return redirect("post")->with("flash_message", "post added!");
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
            $post = Post::findOrFail($id);
            return view("post.show", compact("post"));
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
            $post = Post::findOrFail($id);
    
            return view("post.edit", compact("post"));
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
				"title" => "nullable", //string('title')->nullable()
				"body" => "nullable", //text('body')->nullable()
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"photo" => "nullable", //string('photo')->nullable()

            ]);
            $requestData = $request->all();
            
            $post = Post::findOrFail($id);
            $post->update($requestData);
    
            return redirect("post")->with("flash_message", "post updated!");
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
            Post::destroy($id);
    
            return redirect("post")->with("flash_message", "post deleted!");
        }


        
    }
    //=======================================================================
    
    
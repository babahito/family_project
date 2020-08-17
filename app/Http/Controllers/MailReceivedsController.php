<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\MailReceived;
    
    //=======================================================================
    class MailReceivedsController extends Controller
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
                $mail_received = MailReceived::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("received_user_id", "LIKE", "%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->orWhere("received_life", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $mail_received = MailReceived::paginate($perPage);              
            }          
            return view("mail_received.index", compact("mail_received"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("mail_received.create");
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
				"received_user_id" => "required|integer", //integer('received_user_id')
				"post_id" => "required|integer", //integer('post_id')
				"received_day" => "required|date", //date('received_day')
				"received_life" => "required|integer", //integer('received_life')

            ]);
            $requestData = $request->all();
            
            MailReceived::create($requestData);
    
            return redirect("mail_received")->with("flash_message", "mail_received added!");
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
            $mail_received = MailReceived::findOrFail($id);
            return view("mail_received.show", compact("mail_received"));
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
            $mail_received = MailReceived::findOrFail($id);
    
            return view("mail_received.edit", compact("mail_received"));
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
				"received_user_id" => "required|integer", //integer('received_user_id')
				"post_id" => "required|integer", //integer('post_id')
				"received_day" => "required|date", //date('received_day')
				"received_life" => "required|integer", //integer('received_life')

            ]);
            $requestData = $request->all();
            
            $mail_received = MailReceived::findOrFail($id);
            $mail_received->update($requestData);
    
            return redirect("mail_received")->with("flash_message", "mail_received updated!");
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
            MailReceived::destroy($id);
    
            return redirect("mail_received")->with("flash_message", "mail_received deleted!");
        }
    }
    //=======================================================================
    
    
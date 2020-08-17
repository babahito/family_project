<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\MailSend;
    
    //=======================================================================
    class MailSendsController extends Controller
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
                $mail_send = MailSend::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("send_user_id", "LIKE", "%$keyword%")->orWhere("post_id", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $mail_send = MailSend::paginate($perPage);              
            }          
            return view("mail_send.index", compact("mail_send"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("mail_send.create");
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
				"send_user_id" => "required|integer", //integer('send_user_id')
				"post_id" => "required|integer", //integer('post_id')
				"send_day" => "required|date", //date('send_day')

            ]);
            $requestData = $request->all();
            
            MailSend::create($requestData);
    
            return redirect("mail_send")->with("flash_message", "mail_send added!");
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
            $mail_send = MailSend::findOrFail($id);
            return view("mail_send.show", compact("mail_send"));
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
            $mail_send = MailSend::findOrFail($id);
    
            return view("mail_send.edit", compact("mail_send"));
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
				"send_user_id" => "required|integer", //integer('send_user_id')
				"post_id" => "required|integer", //integer('post_id')
				"send_day" => "required|date", //date('send_day')

            ]);
            $requestData = $request->all();
            
            $mail_send = MailSend::findOrFail($id);
            $mail_send->update($requestData);
    
            return redirect("mail_send")->with("flash_message", "mail_send updated!");
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
            MailSend::destroy($id);
    
            return redirect("mail_send")->with("flash_message", "mail_send deleted!");
        }
    }
    //=======================================================================
    
    
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Attribute;
    
    //=======================================================================
    class AttributesController extends Controller
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
                $attribute = Attribute::where("id","LIKE","%$keyword%")->orWhere("user_id", "LIKE", "%$keyword%")->orWhere("attribute_name", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $attribute = Attribute::paginate($perPage);              
            }          
            return view("attribute.index", compact("attribute"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("attribute.create");
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
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"attribute_name" => "nullable", //string('attribute_name')->nullable()

            ]);
            $requestData = $request->all();
            
            Attribute::create($requestData);
    
            return redirect("attribute")->with("flash_message", "attribute added!");
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
            $attribute = Attribute::findOrFail($id);
            return view("attribute.show", compact("attribute"));
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
            $attribute = Attribute::findOrFail($id);
    
            return view("attribute.edit", compact("attribute"));
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
				"user_id" => "nullable|integer", //integer('user_id')->nullable()
				"attribute_name" => "nullable", //string('attribute_name')->nullable()

            ]);
            $requestData = $request->all();
            
            $attribute = Attribute::findOrFail($id);
            $attribute->update($requestData);
    
            return redirect("attribute")->with("flash_message", "attribute updated!");
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
            Attribute::destroy($id);
    
            return redirect("attribute")->with("flash_message", "attribute deleted!");
        }
    }
    //=======================================================================
    
    
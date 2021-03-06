<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string',
            'email' => 'required|email',
            'text' => 'required|string',
            'send_name' => 'required|string',
            'kazoku_id' => 'integer',
        ];  
    }
}
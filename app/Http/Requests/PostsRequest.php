<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method()=='POST')
        {
            return [
                'title'=>'required',
                'description'=>'required',
                'content'=>'required',
               
                'image'=>'required|image'
            ];
        }
        if($this->method()=='PUT')
        {
            return [
                'title'=>'required',
                'description'=>'required',
                'content'=>'required',
                'image'=>'image'
            ];
        }
    }
}

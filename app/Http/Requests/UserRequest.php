<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
       $rules = [
         'name' => 'required|max:60',
         'birthday' => 'required|date',
         'nationality' => 'required',
         'gender' => 'required',
       ];
       if (auth()->check()) {
         $rules['email'] = 'email|unique:users,email,'.auth()->user()->id;
         $rules['password'] = 'nullable|alpha_num|between:6,12';
       }
       else {
         $rules['email'] = 'email|unique:users,email';
         $rules['password'] = 'required|alpha_num|between:6,12';
       }

       return $rules;
     }
}

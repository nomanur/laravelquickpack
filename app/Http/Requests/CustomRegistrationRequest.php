<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRegistrationRequest extends FormRequest
{
    protected $errorBag = 'form';
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
        return [
            'name'=>'required|alpha_dash|min:2',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'password_confirm'=>'required|same:password',
            'gender'=>'required',
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'name field is required',
            'email.email' => 'Email is not vaild',
            'email.exists' => 'Email is not exist, Please sign up',
            'password.required'=>'Password field is required',
            'password_confirm.same'=>'Password and Password confirm didn\'t match',
            
        ];
    }
}

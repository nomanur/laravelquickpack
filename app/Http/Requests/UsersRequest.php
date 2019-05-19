<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'required|min:6',
            'password_confirm'=>'required|same:password',
            'gender'=>'required',
            'activator'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.alpha_dash' => 'Name only contains alphabet.',
            'name.min'=>'Name cannot be less than 2 charecters.',
            'email.required'  => 'Email field is required.',
            'email.email'  => 'Email is not valid.',
            'password.min'=>'Password cannto be less than 6 charecters.',
            'password_confirm.same'=>'Password and Password confirm didn\'t match',
            'gender.required'=>'Please select one gender',
            'activator.required'=>'Please click to agree.',
        ];
    }
}

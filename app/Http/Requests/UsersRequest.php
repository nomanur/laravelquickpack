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
            'name'=>'required|min:2',
            'email'=>'required',
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'required|min:6',
            'activator'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name field is required.',
            'name.min'=>'Name cannot be less than 2 charecters.',
            'email.required'  => 'Email field is required.',
            'password.min'=>'Password cannto be less than 6 charecters.',
            'activator.required'=>'Please click to agree.',
        ];
    }
}

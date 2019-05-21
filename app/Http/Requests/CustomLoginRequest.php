<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomLoginRequest extends FormRequest
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
            'email'=>'required|email|exists:users',
            'password'=>'required',
        ];
    }

     public function messages()
    {
        return [
            'email.required' => 'Email field is required',
            'email.email' => 'Email is not vaild',
            'email.exists' => 'Email is not exist',
            'password.required'=>'Password field is required',
            
        ];
    }
}

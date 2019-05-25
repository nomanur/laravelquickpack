<?php

namespace App\Http\Requests;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email',
            'working_days'=>'required|array|min:1',
            'role_id'=>'required',
            'is_active'=>'required',
            'gender'=>'required',
          
        ];
    }

    public function messages()
    {

        return [
           'working_days.required' => 'Select minimum one working day.',
           
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CustomRegistrationRequest;

class CustomRegisterController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

    public function showRegistrationForm()
    {
    	return view('front.register');
    }

    public function store(CustomRegistrationRequest $request)
    {

    	 
    	/*return $data = $request->all();

		$user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

		Auth::login($user);*/


    	User::create($request->all());

    	Session::flash('registration_success', 'You are successfully registered please login');

    	if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password] ))  {
            
         if (Auth::user()->hasVerifiedEmail()) {
    		      return redirect()->intended();
            }else{
                return redirect()
                    ->route('verification.notice')
                    ->with('danger', 'You didnt confirm your email yet. ');   
            }             
    	}
    	
    }
}

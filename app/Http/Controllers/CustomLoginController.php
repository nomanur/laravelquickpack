<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CustomLoginRequest;
use Illuminate\Support\Facades\Session;

class CustomLoginController extends Controller
{
    	//show login
    public function showLoginPage(){
        if (Auth::guest()) {
    	   return view('front/login');
        } else{
            return redirect()->back();
        }
    }


    //chekc auth and redirect
    public function login(CustomLoginRequest $request){
        
    	if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password] )) {
            
         if (Auth::user()->hasVerifiedEmail()) {
    		      return redirect()->intended();
            }else{
                return redirect()
                    ->route('verification.notice')
                    ->with('danger', 'You didnt confirm your email yet. ');   
            }             
    	} else{            
            Session::flash('wrong_password', 'User id and password didnt match *');
    		return redirect()->back();
    	}
    }

    public function showHomePage(){
        return view('front/home');
    }
}

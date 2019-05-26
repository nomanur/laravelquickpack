<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Requests\CustomLoginRequest;


class CustomLoginController extends Controller
{

     public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
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



     public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->user();
       
        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);

            return redirect('');
        }else{
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(12345678);
            $user->save();

            Auth::login($user);
            return redirect('/');

        }
        
        
    }
}

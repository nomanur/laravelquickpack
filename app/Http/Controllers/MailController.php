<?php

namespace App\Http\Controllers;

use App\Http\Requests\MailRequest;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;

class MailController extends Controller
{
    public function index()
    {
    	return view('mail.index');
    }

    public function sendMail(MailRequest $request)
    {

    	$subject = $request->subject;
    	$email = $request->email;
    	$message = $request->message;

    	Mail::to($email)->send(new SendEmail($subject, $message));

    	return redirect()->back();
    }
}

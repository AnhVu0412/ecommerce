<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        {
            $email = Auth::user()->email;
            Mail::to($email)->send(new SendMail());
            return redirect('/')->with('status',"We sent verify cart in your email");
        }
    }
}

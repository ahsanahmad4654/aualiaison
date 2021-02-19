<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactusController extends Controller
{
    //
    public function index(){
    	return view('contactus');
    } 

    public function sendEmail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('contact@aualiaison.com')->send(new ContactMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');
    }
}


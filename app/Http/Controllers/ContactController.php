<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }


    public function sendEmail(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        Mail::to('ericklema360@gmail.com')->send(new ContactMail($data));

        return redirect('/contact')->with('success', 'Email sent successfully!');
    }
}

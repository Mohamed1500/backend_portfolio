<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        
        Mail::send('emails.contact', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messageContent' => $request->input('message'),
        ], function ($mail) use ($request) {
            $mail->from($request->input('email'), $request->input('name'));
            $mail->to('mohamed.machmache@student.ehb.be')->subject('Contact Form Submission');
        });

        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
    }
    public function testEmail()
{
    Mail::raw('This is a test email from Laravel.', function ($message) {
        $message->to('admin@example.com')
                ->subject('Test Email');
    });

    return 'Test email sent!';
}
}
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

    try {
        Mail::send('emails.contact', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'messageContent' => $request->input('message'),
        ], function ($mail) use ($request) {
            $mail->from($request->input('email'), $request->input('name'));
            $mail->to('jouw_email@example.com')->subject('Contact Form Submission');
        });
        
        return redirect()->route('contact.create')->with('success', 'Message sent successfully!');
    } catch (\Exception $e) {
        \Log::error('Email sending failed: ' . $e->getMessage());
        return redirect()->route('contact.create')->with('error', 'Error sending email: ' . $e->getMessage());
    }
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
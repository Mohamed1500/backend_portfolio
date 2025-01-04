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

        // Verwerk het contactformulier (bijv. stuur een e-mail)
        Mail::send('emails.contact', [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ], function ($mail) use ($request) {
            $mail->from($request->email, $request->name);
            $mail->to('your-email@example.com')->subject('Contact Form Submission');
        });

        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully!');
    }
}
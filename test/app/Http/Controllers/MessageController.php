<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Message::create([
            'content' => $request->content,
        ]);

        return redirect()->route('faq.index')->with('success', 'Bericht succesvol toegevoegd!');
    }
}

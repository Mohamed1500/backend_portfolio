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
            'category' => 'nullable|string|max:255',
        ]);

        Message::create([
            'content' => $request->content,
            'category' => $request->category,
            'is_visible' => false, // Standaard niet zichtbaar
        ]);

        return redirect()->route('faq.index')->with('success', 'Bericht succesvol toegevoegd!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string|max:255',
        ]);

        $message = Message::findOrFail($id);
        $message->response = $request->response;
        $message->is_visible = true; // Maak het bericht zichtbaar
        $message->save();

        return redirect()->route('faq.index')->with('success', 'Antwoord succesvol toegevoegd!');
    }
}
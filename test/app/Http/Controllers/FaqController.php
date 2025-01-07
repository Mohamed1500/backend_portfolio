<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FaqController extends Controller
{
    public function index(Request $request)
{
    $query = Message::query();

    if ($request->has('search_category') && $request->search_category != '') {
        $query->where('category', $request->search_category);
    }

    // Controleer of de gebruiker ingelogd is en geen admin is
    if (!auth()->check() || !auth()->user()->is_admin) {
        // Alleen berichten met een antwoord van een admin tonen
        $query->whereNotNull('answer')->whereHas('user', function ($q) {
            $q->where('is_admin', true); // Controleer dat het antwoord door een admin is gegeven
        });
    }

    $messages = $query->get();

    return view('faq.faq', compact('messages'));
}


    public function showAnswerForm($id)
    {
        $message = Message::findOrFail($id);
        return view('faq.answer', compact('message'));
    }

    public function answer(Request $request, $id)
    {
        $request->validate([
            'answer' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->answer = $request->input('answer');
        $message->save();

        return redirect()->route('faq.index')->with('success', 'Antwoord succesvol toegevoegd.');
    }
}

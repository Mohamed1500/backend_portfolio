<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(Request $request)
{
    $query = Message::query();

    // Filter op categorie als dit is opgegeven in de zoekopdracht
    if ($request->has('search_category') && $request->search_category != '') {
        $query->where('category', $request->search_category);
    }

    // Alleen berichten met een antwoord tonen als de gebruiker geen admin is
    if (!auth()->check() || !auth()->user()->is_admin) {
        $query->whereNotNull('answer'); // Toon alleen berichten die beantwoord zijn
    }

    // Verkrijg berichten uit de database
    $messages = $query->get();

    // Geef de berichten weer in de FAQ-pagina
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
        $message->answer = $request->answer;
        $message->answer_user_id = Auth::id();
        \Log::info('Answer User ID: ' . Auth::id());

        $message->save();

        return redirect()->route('faq.index')->with('success', 'Antwoord succesvol toegevoegd.');
    }
}
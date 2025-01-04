<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        if (Auth::check() && Auth::user()->is_admin) {
            $messages = Message::when($category, function ($query, $category) {
                return $query->where('category', $category);
            })->get();
        } else {
            $messages = Message::where('is_visible', true)
                ->when($category, function ($query, $category) {
                    return $query->where('category', $category);
                })->get();
        }

        return view('faq.faq', compact('messages', 'category'));
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
        $message->is_visible = true; // Maak het bericht zichtbaar zodra er een antwoord is
        $message->save();

        return redirect()->route('faq.index')->with('success', 'Answer added successfully.');
    }
}
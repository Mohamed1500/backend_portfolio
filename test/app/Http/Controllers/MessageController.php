<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'category' => 'required|string',
        ]);

        Message::create([
            'content' => $request->input('content'),
            'category' => $request->input('category'), // Zorg ervoor dat de categorie wordt opgeslagen
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('faq.index')->with('success', 'Bericht succesvol geplaatst.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
            'category' => 'required|string',
        ]);

        $message = Message::findOrFail($id);
        $message->content = $request->input('content');
        $message->category = $request->input('category'); // Zorg ervoor dat de categorie wordt bijgewerkt
        $message->save();

        return redirect()->route('faq.index')->with('success', 'Bericht succesvol bijgewerkt.');
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('faq.index')->with('success', 'Bericht succesvol verwijderd.');
    }
}
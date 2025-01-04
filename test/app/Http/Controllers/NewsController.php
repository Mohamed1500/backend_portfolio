<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = NewsItem::orderBy('created_at', 'desc')->get();
        return view('news.index', compact('newsItems'));
    }

    public function show($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        return view('news.show', compact('newsItem'));
    }

    public function create()
    {
        return view('news.newsitem'); // Verwijs naar de juiste view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        $imagePath = $request->file('image')->store('news_images', 'public');

        NewsItem::create([
            'title' => $request->input('title'),
            'image' => $imagePath,
            'content' => $request->input('content'),
            'published_at' => now(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsbericht succesvol geplaatst.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsItem;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
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

        $newsItem = new NewsItem();
        $newsItem->title = $request->title;
        $newsItem->image = $request->file('image')->store('news_images', 'public');
        $newsItem->content = $request->content;
        $newsItem->user_id = Auth::id();
        $newsItem->published_at = now();
        $newsItem->save();

        return redirect()->route('news.index')->with('success', 'News item created successfully.');
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->news_item_id = $id;
        $comment->user_id = Auth::id();
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('news.show', $id)->with('success', 'Comment added successfully.');
    }
    public function destroy($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        $newsItem->delete();

        return redirect()->route('news.index')->with('success', 'News item deleted successfully.');
    }
}
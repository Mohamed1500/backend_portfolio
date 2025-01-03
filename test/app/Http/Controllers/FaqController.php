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

        return view('faq', compact('messages', 'category'));
    }
}
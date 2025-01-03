<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class FaqController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('faq', compact('messages'));
    }
}
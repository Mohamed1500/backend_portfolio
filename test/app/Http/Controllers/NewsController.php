<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        // Voeg hier je logica toe om nieuws op te halen en weer te geven
        return view('news');
    }
}
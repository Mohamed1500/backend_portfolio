<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function show()
    {
        // Voeg hier je logica toe om het contactformulier weer te geven
        return view('contact');
    }
}
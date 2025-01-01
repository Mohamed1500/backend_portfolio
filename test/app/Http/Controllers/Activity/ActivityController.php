<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the activities.
     */
    public function index()
    {
        // Voeg hier je logica toe om activiteiten op te halen en weer te geven
        return view('activities.index');
    }
}
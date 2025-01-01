<?php
// filepath: /Ubuntu/home/mohamed/workspace/backend_portfolio/test/app/Http/Controllers/NewsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        // Voeg hier je logica toe om nieuws op te halen
        return view('news');
    }
}
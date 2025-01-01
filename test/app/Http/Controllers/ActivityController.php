<?php
// filepath: /Ubuntu/home/mohamed/workspace/backend_portfolio/test/app/Http/Controllers/ActivityController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function index()
    {
        // Voeg hier je logica toe om activiteiten op te halen
        $activities = [
            ['title' => 'Activiteit 1', 'description' => 'Beschrijving van activiteit 1', 'image' => 'images_backend/jeugdbeweging1.jpg'],
            ['title' => 'Activiteit 2', 'description' => 'Beschrijving van activiteit 2', 'image' => 'images_backend/jeugdbeweging2.jpg'],
            // Voeg meer activiteiten toe indien nodig
        ];

        return view('activities.index', compact('activities'));
    }
}
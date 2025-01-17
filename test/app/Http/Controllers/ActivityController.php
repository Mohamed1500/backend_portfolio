<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $activity = new Activity();
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->image = $request->file('image')->store('activity_images', 'public');
        $activity->save();

        return redirect()->route('activities.index')->with('success', 'Activiteit succesvol toegevoegd.');
    }
    public function destroy($id)
{
    $activity = Activity::findOrFail($id);
    $activity->delete();

    return redirect()->route('activities.index')->with('success', 'Activiteit succesvol verwijderd.');
}

}
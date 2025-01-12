<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'about_me' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->about_me = $request->about_me;

        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $imageName = uniqid().'.'.$request->profile_picture->extension();
            $request->profile_picture->storeAs('profile_pictures', $imageName, 'public');
            $user->profile_picture = $imageName;
            
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function editBirthdate()
    {
        return view('profile.edit-birthdate', ['user' => Auth::user()]);
    }

    public function updateBirthdate(Request $request)
    {
        $request->validate([
            'birthdate' => 'required|date',
        ]);

        $user = Auth::user();
        $user->birthdate = $request->birthdate;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Birthdate updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('welcome');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('profile.show', compact('user'));
    }
    public function storeUser(Request $request)
{
    if (!Auth::user()->is_admin) {
        abort(403, 'Unauthorized');
    }

    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'is_admin' => 'nullable|boolean',
    ]);

    
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'is_admin' => $request->input('is_admin') == "1",
    ]);

    
    return redirect()->back()->with('success', 'User created successfully.');
}

}
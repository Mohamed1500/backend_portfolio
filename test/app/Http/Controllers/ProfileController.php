<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'birthdate' => ['required', 'date'],
            'username' => ['nullable', 'string', 'max:255'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'about_me' => ['nullable', 'string'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->username = $request->username;
        $user->about_me = $request->about_me;

        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }
}
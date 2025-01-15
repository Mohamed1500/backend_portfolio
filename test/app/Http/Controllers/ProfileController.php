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
                Storage::disk('public')->delete('profile_pictures/' . $user->profile_picture);
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

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('home');
    }

    public function show($id)
{
    $user = User::findOrFail($id);

    // Voorkom dat niet-bestaande gebruikersprofielen worden getoond
    if (!$user) {
        abort(404, 'Gebruiker niet gevonden.');
    }

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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin ?? false;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function upgradeToAdmin($id)
    {
        $user = User::findOrFail($id);
        $user->is_admin = true;
        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'User upgraded to admin successfully.');
    }
    public function downgradeToUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            return redirect()->route('profile.show', $user->id)->with('error', 'Je kunt jezelf niet degraderen.');
        }

        $user->is_admin = false;
        $user->save();

        return redirect()->route('profile.show', $user->id)->with('success', 'Admin gedegradeerd naar gebruiker.');
    }
}
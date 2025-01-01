<?php

namespace App\Http\Controllers;

    use App\Http\Requests\ProfileUpdateRequest;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\View\View;

    class ProfileController extends Controller
    {
        /**
         * Display the user's profile form.
         */
        public function edit(Request $request): View
        {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        }

        /**
         * Update the user's profile information.
         */
        public function update(ProfileUpdateRequest $request): RedirectResponse
        {
            $user = $request->user();

            // Validate and upload the profile picture
            if ($request->hasFile('profile_picture')) {
                $request->validate([
                    'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $imageName = time().'.'.$request->profile_picture->extension();  
                $request->profile_picture->storeAs('public/profile_pictures', $imageName);
                $user->profile_picture = 'profile_pictures/' . $imageName;
            }

            // Update other profile information
            $user->fill($request->validated());
            $user->save();

            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
    }
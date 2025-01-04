<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="birthdate" :value="__('Birthdate')" />
            <x-text-input id="birthdate" name="birthdate" type="date" class="mt-1 block w-full" :value="old('birthdate', $user->birthdate)" required />
            <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
        </div>

        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-input-label for="profile_picture" :value="__('Profile Picture')" />
            <x-text-input id="profile_picture" name="profile_picture" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_picture')" />
            @if ($user->profile_picture)
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="mt-4 w-32 h-32 rounded-full">
            @endif
        </div>

        <div>
            <x-input-label for="about_me" :value="__('About Me')" />
            <textarea id="about_me" name="about_me" class="mt-1 block w-full" rows="5">{{ old('about_me', $user->about_me) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about_me')" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</section>
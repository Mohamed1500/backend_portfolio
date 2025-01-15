<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center">
                        {{-- Profielafbeelding tonen of een fallback weergeven --}}
                        @if ($user->profile_picture)
                            <img src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" 
                                 alt="{{ $user->name }}" 
                                 class="w-20 h-20 rounded-full mr-4">
                        @else
                            <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center mr-4">
                                <span class="text-gray-700">Geen foto</span>
                            </div>
                        @endif

                        <div>
                            <h3 class="text-xl font-bold">{{ $user->name }}</h3>
                            
                            {{-- Alleen tonen als de gebruiker is ingelogd --}}
                            @auth
                                <p class="text-gray-400">{{ $user->email }}</p>
                            @endauth
                        </div>
                    </div>

                    <div class="mt-6">
                        {{-- "About Me" sectie --}}
                        <p><strong>About Me:</strong> {{ $user->about_me ?? 'Geen informatie beschikbaar' }}</p>
                        
                        {{-- Geboortedatum tonen --}}
                        <p><strong>Geboortedatum:</strong> 
                            {{ $user->birthdate ? $user->birthdate->format('d-m-Y') : 'Niet beschikbaar' }}
                        </p>
                    </div>

                    {{-- Knop om profiel te bewerken, alleen voor eigen profiel --}}
                    @auth
                        @if (Auth::id() === $user->id)
                            <div class="mt-6">
                                <a href="{{ route('profile.edit') }}" class="text-blue-500 hover:underline">
                                    {{ __('Bewerk je profiel') }}
                                </a>
                            </div>
                        @endif
                    @endauth

                    {{-- Admin-acties, alleen voor admins --}}
                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="mt-6">
                                @if (!$user->is_admin)
                                    {{-- Knop om gebruiker te upgraden naar admin --}}
                                    <form method="POST" action="{{ route('profile.upgrade', $user->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-primary-button>
                                            {{ __('Upgrade naar Admin') }}
                                        </x-primary-button>
                                    </form>
                                @else
                                    {{-- Knop om admin te degraderen naar gebruiker --}}
                                    <form method="POST" action="{{ route('profile.downgrade', $user->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <x-danger-button>
                                            {{ __('Degradeer naar Gebruiker') }}
                                        </x-danger-button>
                                    </form>
                                @endif
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

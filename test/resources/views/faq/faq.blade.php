<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="text-2xl font-bold mb-4">Zoek op categorie</h3>
                    <form method="GET" action="{{ route('faq.index') }}">
                        <div>
                            <x-input-label for="search_category" :value="__('Categorie')" class="text-black" />
                            <select id="search_category" name="search_category" class="mt-1 block w-full text-black">
                                <option value="">Alle</option>
                                <option value="Algemeen">Algemeen</option>
                                <option value="Technisch">Technisch</option>
                                <option value="Overig">Overig</option>
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Zoek') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <h3 class="text-2xl font-bold mb-4 mt-8">Berichten</h3>
                    @if ($messages->count() > 0)
                        @foreach ($messages as $message)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded mb-4">
                                <p><strong>Categorie:</strong> {{ $message->category }}</p>
                                <p><strong>Vraag:</strong> {{ $message->content }}</p>
                                @if ($message->answer)
                                    <p class="mt-2"><strong>Antwoord:</strong> {{ $message->answer }}</p>
                                @else
                                    <p class="mt-2 text-red-500"><strong>Geen antwoord beschikbaar</strong></p>
                                @endif
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <a href="{{ route('profile.show', $message->user->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-800 mr-2">
                                            {{ __('Zie profiel van vraagsteller') }}
                                        </a>
                                        @if ($message->answer_user_id)
                                            <a href="{{ route('profile.show', $message->answerUser->id) }}" class="bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-800">
                                                {{ __('Zie profiel van beantwoorder') }}
                                            </a>
                                        @endif
                                    </div>
                                    @if (Auth::check() && Auth::user()->is_admin)
                                        <div class="flex items-center">
                                            <a href="{{ route('faq.showAnswerForm', $message->id) }}" class="text-indigo-600 hover:text-indigo-800 mr-4">Antwoorden</a>
                                            <form method="POST" action="{{ route('messages.destroy', $message->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>
                                                    {{ __('Verwijderen') }}
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded mb-4">
                            Er zijn nog geen berichten toegevoegd.
                        </div>
                    @endif

                    <h3 class="text-2xl font-bold mb-4 mt-8">Plaats een nieuw bericht</h3>
                    <form method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="content" :value="__('Bericht')" class="text-black" />
                            <textarea id="content" name="content" class="mt-1 block w-full text-black" rows="5" required>{{ old('content') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div>
                            <x-input-label for="category" :value="__('Categorie')" class="text-black" />
                            <select id="category" name="category" class="mt-1 block w-full text-black" required>
                                <option value="Algemeen">Algemeen</option>
                                <option value="Technisch">Technisch</option>
                                <option value="Overig">Overig</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Verstuur') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nieuws') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="mb-8">
                        Blijf op de hoogte van al onze evenementen, activiteiten en belangrijke mededelingen.
                    </p>

                    @if (Auth::check() && Auth::user()->is_admin)
                        <div class="flex justify-end mb-4">
                            <a href="{{ route('news.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                                Voeg nieuwsbericht toe
                            </a>
                        </div>
                    @endif

                    <!-- Nieuws Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($newsItems as $newsItem)
                            <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                                <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-40 object-cover rounded-md mb-4">
                                <h2 class="text-2xl font-bold mb-2">{{ $newsItem->title }}</h2>
                                <p class="text-gray-600 dark:text-gray-400 mb-4">
                                    {{ Str::limit($newsItem->content, 100) }}
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                    {{ $newsItem->created_at->format('d M Y') }}
                                </p>
                                <a href="{{ route('news.show', $newsItem->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Lees meer →</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
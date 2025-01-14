<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-7xl font-bold text-center mb-8 text-green-600">Onze Activiteiten</h1>

        @if (Auth::user()->is_admin)
            <div class="mb-8">
                <a href="{{ route('activities.create') }}" class="bg-indigo-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-indigo-700">
                    Nieuwe Activiteit Toevoegen
                </a>
            </div>
        @endif

        @if($activities->isEmpty())
            <p class="text-center text-gray-500">Er zijn momenteel geen activiteiten beschikbaar.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($activities as $activity)
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ $activity->image ? asset('storage/' . $activity->image) : asset('default.jpg') }}" 
                             alt="{{ $activity->title ?? 'Geen titel' }}" 
                             class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ $activity->title ?? 'Geen titel beschikbaar' }}</h2>
                            <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $activity->description ?? 'Geen beschrijving beschikbaar' }}</p>
                            <div class="mt-4 text-gray-600 dark:text-gray-400">
                            </div>
                            <a href="{{ route('dashboard') }}" 
                               class="mt-4 inline-block bg-indigo-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-indigo-700">
                                <- Terug  
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>

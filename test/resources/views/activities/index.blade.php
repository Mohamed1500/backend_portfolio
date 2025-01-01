<x-app-layout>
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center mb-8">Onze Activiteiten</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($activities as $activity)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ $activity['title'] }}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $activity['description'] }}</p>
                        <div class="mt-4 text-gray-600 dark:text-gray-400">
                            <p><strong>Datum:</strong> 15 juli 2024</p>
                            <p><strong>Tijd:</strong> 10:00 - 16:00</p>
                            <p><strong>Locatie:</strong> Sporthal XYZ, Jeugdlaan 10, Brussel</p>
                            <p><strong>Leeftijdsgroep:</strong> 6-12 jaar</p>
                            <p><strong>Kosten:</strong> Gratis voor leden, €5 voor niet-leden</p>
                            <p><strong>Benodigdheden:</strong> Sportkleding, waterfles, lunchpakket</p>
                        </div>
                        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-indigo-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-indigo-700">
                            <- Terug  
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
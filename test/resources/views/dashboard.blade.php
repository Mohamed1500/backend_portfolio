<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <!-- Welkomstsectie -->
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gray-800 dark:text-white mb-4">Welkom bij Jeugdbeweging MoMo</h1>
            <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mx-auto">
                Bij Jeugdbeweging MoMo bieden we een plek waar jongeren samenkomen om plezier te maken, nieuwe vrienden te maken en levenslange herinneringen te creëren. Doe mee en ontdek een wereld van avontuur, samenwerking en creativiteit!
            </p>
        </div>

        <!-- Hoofdkaarten -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Activiteiten -->
    <div class="p-6 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-lg shadow-lg text-white">
        <div class="flex justify-between">
            <div class="flex-grow mr-4">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                    </svg>
                    <h2 class="text-2xl font-bold">Onze Activiteiten</h2>
                </div>
                <p class="text-sm mb-6">
                    Elke week organiseren we leuke en uitdagende activiteiten zoals spellen, kampen en uitstapjes.
                </p>
                <a href="{{ route('activities.index') }}" class="inline-block bg-orange-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-orange-700">
                    Lees meer →
                </a>
                <div class="flex mt-4">
                    <img src="{{ asset('images_backend/jeugdbeweging1.jpg') }}" alt="Activiteiten" class="rounded-lg mb-4 mr-4" style="width: 500px; height: auto;">
                </div>
            </div>
        </div>
    </div>

            <!-- Laatste Nieuws -->
            <div class="p-6 bg-gradient-to-r from-green-500 to-teal-500 rounded-lg shadow-lg text-white">
        <div class="flex items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A2 2 0 0018 6H6a2 2 0 00-1.553 3.724L9 10M15 10l-4.553 2.276A2 2 0 0012 14h6a2 2 0 001.553-3.724L15 10z" />
            </svg>
            <h2 class="text-2xl font-bold">Laatste Nieuws</h2>
        </div>
        <p class="text-sm mb-6">
            Blijf op de hoogte van al onze evenementen en mededelingen.
        </p>
        <a href="{{ route('news.index') }}" class="inline-block bg-orange-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-orange-700">
            Lees meer →
        </a>
        <div class="flex mt-4">
            <img src="{{ asset('images_backend/camping.jpg') }}" alt="Camping" class="rounded-lg mb-4 mr-4" style="width: 500px; height: auto;">
        </div>
    </div>

            


            <!-- FAQ -->
            <div class="p-6 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg shadow-lg text-white">
                <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H7m1 0h8m0 0h1m-1 0H8m0 0v-4m0 8v4m-3-3h16" />
                </svg>
                    <h2 class="text-2xl font-bold">FAQ</h2>
                </div>
                <p class="text-sm mb-6">
                    Vragen? Aarzel niet en stel all je vragen in onze FAQ sectie!
                </p>
                <a href="{{ route('faq') }}" class="inline-block bg-orange-600 text-white font-medium py-2 px-4 rounded shadow hover:bg-orange-700">
                   FAQ →
                </a>
            </div>
        </div>

        <!-- Motivatieblok -->
        <div class="mt-16 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-4">Waarom kiezen voor Jeugdbeweging MoMo?</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                Wij staan bekend om onze inclusieve en inspirerende sfeer, waar jongeren zichzelf kunnen zijn en groeien in een ondersteunende gemeenschap. Ontdek de magie van samenzijn en samenwerken!
            </p>
        </div>
    </div>
</x-app-layout>

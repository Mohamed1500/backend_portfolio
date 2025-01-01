<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Pagina Titel -->
                    <h1 class="text-4xl font-extrabold mb-6 text-center">Laatste Nieuws</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400 text-center mb-10">
                        Blijf op de hoogte van al onze evenementen, activiteiten en belangrijke mededelingen.
                    </p>

                    <!-- Nieuws Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <!-- Nieuws Artikel 1 -->
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x150" alt="Nieuwsafbeelding 1" class="w-full h-40 object-cover rounded-md mb-4">
                            <h2 class="text-2xl font-bold mb-2">Nieuwsartikel 1</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Dit is een korte samenvatting van het nieuwsartikel. Ontdek meer details door verder te lezen.
                            </p>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Lees meer →</a>
                        </div>

                        <!-- Nieuws Artikel 2 -->
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x150" alt="Nieuwsafbeelding 2" class="w-full h-40 object-cover rounded-md mb-4">
                            <h2 class="text-2xl font-bold mb-2">Nieuwsartikel 2</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Blijf op de hoogte van het laatste nieuws. Lees verder om alle details te ontdekken.
                            </p>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Lees meer →</a>
                        </div>

                        <!-- Nieuws Artikel 3 -->
                        <div class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x150" alt="Nieuwsafbeelding 3" class="w-full h-40 object-cover rounded-md mb-4">
                            <h2 class="text-2xl font-bold mb-2">Nieuwsartikel 3</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                Lees hier meer over de activiteiten en evenementen die binnenkort plaatsvinden.
                            </p>
                            <a href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">Lees meer →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
                    <!-- Voeg hier je inhoud toe -->
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h3 class="text-2xl font-bold mb-4">Zoek via categorieën</h3>
                    <div class="mb-4">
                        <select id="category" name="category" class="w-full p-2 rounded" style="color: black;" onchange="filterByCategory(this.value)">
                            <option value="">Selecteer een categorie</option>
                            <option value="category1" {{ $category == 'category1' ? 'selected' : '' }}>Categorie 1</option>
                            <option value="category2" {{ $category == 'category2' ? 'selected' : '' }}>Categorie 2</option>
                            <option value="category3" {{ $category == 'category3' ? 'selected' : '' }}>Categorie 3</option>
                            <option value="category4" {{ $category == 'category4' ? 'selected' : '' }}>Categorie 4</option>
                            <option value="Andere" {{ $category == 'Andere' ? 'selected' : '' }}>Andere</option>
                            <!-- Voeg meer categorieën toe indien nodig -->
                        </select>
                    </div>

                    <h3 class="text-2xl font-bold mb-4">Berichten</h3>
                    @if ($messages->count() > 0)
                        @foreach ($messages as $message)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded mb-4">
                                {{ $message->content }}
                            </div>
                        @endforeach
                    @else
                        <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded mb-4">
                            Er zijn nog geen berichten toegevoegd.
                        </div>
                    @endif

                    <h3 class="text-2xl font-bold mb-4">Voeg een bericht toe</h3>
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <select name="category" class="w-full p-2 rounded" style="color: black;" required>
                                <option value="">Selecteer een categorie</option>
                                <option value="category1">Categorie 1</option>
                                <option value="category2">Categorie 2</option>
                                <option value="category3">Categorie 3</option>
                                <option value="category4">Categorie 4</option>
                                <option value="Andere">Andere</option>
                                <!-- Voeg meer categorieën toe indien nodig -->
                            </select>
                        </div>
                        <textarea name="content" rows="4" class="w-full p-2 rounded" placeholder="Schrijf je bericht hier..." style="color: black;" required></textarea>
                        <button type="submit" class="mt-2 bg-blue-500 text-white py-2 px-4 rounded">Post bericht</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function filterByCategory(category) {
        window.location.href = "{{ route('faq.index') }}?category=" + category;
    }
</script>
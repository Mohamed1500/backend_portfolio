@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center mb-8">Onze Activiteiten</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($activities as $activity)
                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <img src="{{ asset($activity['image']) }}" alt="{{ $activity['title'] }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">{{ $activity['title'] }}</h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-2">{{ $activity['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
</x-app-layout>

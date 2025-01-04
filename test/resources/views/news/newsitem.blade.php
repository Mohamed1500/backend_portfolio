<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Plaats een nieuwsbericht') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Titel')" class="text-black" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full text-black" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="image" :value="__('Afbeelding')" class="text-black" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full text-black" required />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="content" :value="__('Content')" class="text-black" />
                            <textarea id="content" name="content" class="mt-1 block w-full text-black" rows="5" required>{{ old('content') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Plaats nieuwsbericht') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Answer Message') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('faq.answer', $message->id) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="answer" :value="__('Answer')" class="text-black" />
                            <textarea id="answer" name="answer" class="mt-1 block w-full text-black" rows="5" required>{{ old('answer', $message->answer) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('answer')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
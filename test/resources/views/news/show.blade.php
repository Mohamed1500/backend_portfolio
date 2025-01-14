<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $newsItem->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-60 object-cover rounded-md mb-4">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        {{ $newsItem->created_at->format('d M Y') }}
                    </p>
                    <p class="text-gray-900 dark:text-gray-100 mb-4">
                        {{ $newsItem->content }}
                    </p>
                    <a href="{{ route('news.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Terug naar nieuws</a>

                    <div class="mt-6">
                        <h4 class="text-xl font-bold">Comments</h4>
                        @foreach ($newsItem->comments as $comment)
                            <div class="mt-4">
                                <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                            </div>
                        @endforeach
                    </div>

                    @auth
                        <div class="mt-6">
                            <form method="POST" action="{{ route('news.comment.store', $newsItem->id) }}">
                                @csrf
                                <div>
                                    <x-input-label for="content" :value="__('Comment')" />
                                    <textarea style='color:black' id="content" name="content" class="mt-1 block w-full" rows="4" required></textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <x-primary-button>
                                        {{ __('Add Comment') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
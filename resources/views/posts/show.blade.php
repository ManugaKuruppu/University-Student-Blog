<x-app-layout :title="$post->title">
    <nav class="bg-gray-800 p-4 flex justify-between items-center">
        <a href="#" class="text-white text-xl font-bold">Logo</a>
        <button id="menu-toggle" class="text-gray-300 focus:outline-none focus:text-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </nav>
    <div id="menu" class="hidden md:flex md:flex-col md:bg-gray-200 md:px-4 md:py-8 md:w-64">
        <!-- Menu items -->
    </div>
    <div id="content" class="flex flex-col items-center justify-center px-4 py-8">
        <article class="w-full max-w-xl">
            <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailUrl() }}" alt="thumbnail">
            <h1 class="text-4xl font-bold text-left text-gray-800">
                {{ $post->title }}
            </h1>
            <div class="flex items-center justify-between mt-2">
                <div class="flex items-center py-5">
                    <x-posts.author :author="$post->author" size="md" />
                    <span class="text-sm text-gray-500">| {{ $post->getReadingTime() }} min read</span>
                </div>
                <div class="flex items-center">
                    <span class="mr-2 text-gray-500">{{ $post->published_at->diffForHumans() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.3"
                         stroke="currentColor" class="w-5 h-5 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>

            <div
                class="flex items-center justify-between px-2 py-4 my-6 text-sm border-t border-b border-gray-100 article-actions-bar">
                <div class="flex items-center">
                    <livewire:like-button :key="'like-' . $post->id" :$post />
                </div>
                <div>
                    <div class="flex items-center">
                    </div>
                </div>
            </div>

            <div class="py-3 text-lg prose text-justify text-gray-800 article-content">
                {!! $post->body !!}
            </div>

            <div class="flex items-center mt-10 space-x-4">
                @foreach ($post->categories as $category)
                    <x-posts.category-badge :category="$category" />
                @endforeach
            </div>

            <livewire:post-comments :key="'comments' . $post->id" :$post />
        </article>
    </div>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            var menu = document.getElementById('menu');
            menu.classList.toggle('hidden');
        });
    </script>
</x-app-layout>

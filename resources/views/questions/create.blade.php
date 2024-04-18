<x-app-layout title="Create a Question">
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('questions.store') }}">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Question Title</label>
                <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
            </div>
            <div class="mt-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>
            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Post Question
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

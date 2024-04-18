<x-app-layout title="Q&A">
    <div class="pt-10 mt-10 border-t border-gray-100 comments-box">
        <div class="flex">
            <div class="w-1">
                <h2 class="mb-5 text-4xl font-semibold text-gray-900">Questions and Answers</h2>
                <!-- Your questions and answers content here -->
            </div>
            <div class="w-1/2 justify-end items-end">
                <a href="{{ route('questions.create') }}" class="mb-1 inline-block px-4 py-2 rounded bg-gray-500 text-white">Create Question</a>
            </div>
        </div>
        <!-- List of Questions and their Answers -->
        @foreach ($questions as $question)
            <div class="py-5 mb-4 border-b border-gray-200">
                <div class="mb-2 font-semibold text-lg text-gray-800">{{ $question->title }}</div>
                <div class="text-sm text-justify text-gray-700 mb-4">{{ $question->description }}</div>

                <!-- List Answers -->
                @forelse ($question->answers as $answer)
                    <div class="ml-4 p-2 border-l-4 border-blue-300 bg-gray-50">
                        <div class="text-sm text-gray-600">{{ $answer->content }}</div>
                    </div>
                @empty
                    <p class="ml-4 text-sm text-gray-500">No answers yet.</p>
                @endforelse

                <!-- Form to Add an Answer -->
                <form method="POST" action="{{ route('answers.store', $question) }}" class="ml-4 mt-2">
                    @csrf
                    <textarea name="content" rows="2" class="w-full rounded border-gray-300" placeholder="Type your answer here..."></textarea>
                    <button type="submit" class="mt-2 px-4 py-1 bg-white-500 text-black rounded">Submit Answer</button>
                </form>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="ml-4 mt-2 text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $questions->links() }}
        </div>
    </div>
</x-app-layout>

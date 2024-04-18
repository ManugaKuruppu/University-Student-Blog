<x-app-layout>
    <div>
        <h1>{{ $question->title }}</h1>
        <p>{{ $question->description }}</p>
        <hr>
        <h2>Answers:</h2>
        @foreach ($question->answers as $answer)
            <div>{{ $answer->content }}</div>
        @endforeach
        <form method="POST" action="{{ url('questions/' . $question->id . '/answers') }}">
            @csrf
            <textarea name="content"></textarea>
            <button type="submit">Post Answer</button>
        </form>
    </div>
</x-app-layout>

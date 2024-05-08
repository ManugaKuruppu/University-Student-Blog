<!-- resources/views/notifications/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">New Events</h1>
        @foreach($newEvents as $event)
            <div class="border-b border-gray-200 py-4">
                <h2 class="text-xl font-bold">{{ $event->title }}</h2>
                <p>{{ $event->body }}</p>
                <!-- Additional event information can be displayed here -->
            </div>
        @endforeach
    </div>
@endsection

<div>
    <div class="space-y-4 mt-4">
        @foreach ($jobs as $job)
            <div class="p-4 border rounded shadow my-2 flex">
                <div class="flex-none">
                    <img src="{{ $job->cover_image_url }}" alt="Cover Image" class="w-300px h-auto object-cover rounded" style="width: 150px;">
                </div>
                <div class="flex-grow ml-4">
                    <h2 class="font-bold text-lg">
                        <a href="{{ route('jobs.show', $job) }}" class="text-blue-500 hover:text-blue-600">{{ $job->title }}</a>
                    </h2>
                    <p>{{ Str::limit($job->description, 150) }}</p>
                    <p>Type: {{ $job->type }}</p>
                    <p>Location: {{ $job->location }}</p>
                </div>
            </div>
        @endforeach

    </div>

    {{ $jobs->links() }}
</div>

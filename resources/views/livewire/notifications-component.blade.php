<div>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">New Events</h1>
        <div x-data="{ showPanel: @entangle('togglePanel') }">
            <button @click="showPanel = !showPanel" class="focus:outline-none">
                Toggle Notifications
            </button>
            <div x-show="showPanel" @click.away="showPanel = false" class="border border-gray-200 p-4 mt-4">
                <!-- Notifications content here -->
                @foreach($newEvents as $event)
                    <div class="border-b border-gray-200 py-4">
                        <h2 class="text-xl font-bold">{{ $event->title }}</h2>
                        <p>{{ $event->body }}</p>
                        <!-- Additional event information can be displayed here -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

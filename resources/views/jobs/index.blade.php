<x-app-layout title="Jobs">
    <div class="grid w-full grid-cols-4 gap-10">
        <div class="col-span-4 md:col-span-3">
            <livewire:jobs-list />
        </div>
        <div id="side-bar" class="sticky top-0 h-screen col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
            <!-- You can include sidebar elements here like filters or links -->
        </div>
    </div>
</x-app-layout>

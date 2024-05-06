<!-- navigation-menu.blade.php -->
<div>
    <nav class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
        <div id="nav-left" class="flex items-center">
            <a href="{{ route('home') }}">
                <x-application-mark />
            </a>
            <div class="ml-10 top-menu hidden md:flex md:space-x-4">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('menu.home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('menu.blog') }}
                </x-nav-link>
                <x-nav-link href="{{ route('event.index') }}" :active="request()->routeIs('event.index')">
                    {{ __('menu.event') }}
                </x-nav-link>
                <x-nav-link href="{{ route('questions.index') }}" :active="request()->routeIs('questions.index')">
                    {{ __('menu.q&a') }}
                </x-nav-link>
                <x-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')">
                    {{ __('menu.jobs') }}
                </x-nav-link>
            </div>
        </div>
        <div id="nav-right" class="flex items-center md:space-x-6">
            <button id="menu-toggle" class="block md:hidden focus:outline-none">
                <!-- Menu Icon -->
            </button>
            @auth
                @include('layouts.partials.header-right-auth')
            @else
                @include('layouts.partials.header-right-guest')
            @endauth
        </div>
    </nav>

    <!-- Mobile Navigation Panel -->
    <div id="mobile-nav-panel" class="fixed inset-0 bg-gray-800 bg-opacity-75 z-50 hidden">
        <div class="flex flex-col h-full justify-between">
            <div class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
                <a href="{{ route('home') }}">
                    <x-application-mark class="text-white" />
                </a>
                <button id="menu-close" class="text-white focus:outline-none">
                    <!-- Close Icon -->
                </button>
            </div>
            <div class="flex flex-col mt-8 space-y-4 px-6">
                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')" class="text-white">
                    {{ __('menu.home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')" class="text-white">
                    {{ __('menu.blog') }}
                </x-nav-link>
                <x-nav-link href="{{ route('event.index') }}" :active="request()->routeIs('event.index')" class="text-white">
                    {{ __('menu.event') }}
                </x-nav-link>
                <x-nav-link href="{{ route('questions.index') }}" :active="request()->routeIs('questions.index')" class="text-white">
                    {{ __('menu.q&a') }}
                </x-nav-link>
                <x-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')" class="text-white">
                    {{ __('menu.jobs') }}
                </x-nav-link>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-nav-panel').classList.toggle('hidden');
        });

        document.getElementById('menu-close').addEventListener('click', function () {
            document.getElementById('mobile-nav-panel').classList.add('hidden');
        });
    </script>
</div>

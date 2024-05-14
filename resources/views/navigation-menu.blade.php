<!-- navigation-menu.blade.php -->
<div>
    <nav class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
        <div id="nav-left" class="flex items-center">
            <a href="{{ route('home') }}">
                <x-application-mark />
            </a>
            <div class="ml-10 top-menu hidden md:flex md:space-x-4">
                <!-- Other menu items -->
                <!-- Add bell icon for notifications -->
                <a href="{{ route('notifications.index') }}" id="notification-toggle" class="focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="64" height="64" viewBox="0 0 256 256" xml:space="preserve">

<defs>
</defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(49.50661478599223 49.5066147859922) scale(1.73 1.73)" >
                            <path d="M 62.238 59.916 H 27.762 c -2.066 0 -3.747 -1.681 -3.747 -3.747 c 0 -2.195 0.957 -4.271 2.626 -5.696 c 0.777 -0.664 1.223 -1.632 1.223 -2.654 V 35.135 C 27.865 25.687 35.552 18 45 18 s 17.136 7.687 17.136 17.135 v 12.683 c 0 1.022 0.446 1.99 1.224 2.655 c 1.669 1.426 2.626 3.502 2.626 5.695 C 65.985 58.235 64.305 59.916 62.238 59.916 z M 28.024 55.916 h 33.952 c -0.067 -0.928 -0.502 -1.792 -1.215 -2.401 c -1.669 -1.426 -2.626 -3.502 -2.626 -5.696 V 35.135 C 58.136 27.893 52.243 22 45 22 c -7.243 0 -13.135 5.893 -13.135 13.135 v 12.683 c 0 2.193 -0.957 4.27 -2.625 5.696 C 28.525 54.124 28.091 54.988 28.024 55.916 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 39.918 64.884 c 0 0.011 -0.002 0.022 -0.002 0.033 C 39.916 67.724 42.192 70 45 70 s 5.084 -2.276 5.084 -5.084 c 0 -0.011 -0.002 -0.022 -0.002 -0.033" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 4 C 22.393 4 4 22.393 4 45 s 18.393 41 41 41 s 41 -18.393 41 -41 S 67.607 4 45 4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
</svg>
                </a>
                <!-- Add the notifications popup -->
{{--                <div id="notification-panel" class="hidden absolute bg-white rounded-lg shadow-md mt-2 px-4 py-2 w-64">--}}
{{--                    <h1 class="text-lg font-bold mb-2">New Events</h1>--}}
{{--                    <!-- Iterate over notifications -->--}}
{{--                    @foreach($newEvents as $event)--}}
{{--                        <div class="border-b border-gray-200 py-2">--}}
{{--                            <h2 class="text-base font-bold">{{ $event->title }}</h2>--}}
{{--                            <p>{{ $event->body }}</p>--}}
{{--                            <!-- Additional event information can be displayed here -->--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
            </div>
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
                @auth
                    @if(auth()->user()->academic_year >= 2)
                        <x-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')">
                            {{ __('menu.jobs') }}
                        </x-nav-link>
                    @endif
                @endauth
            </div>
        </div>
        <div id="nav-right" class="flex items-center md:space-x-6">
            <button id="menu-toggle" class="block md:hidden focus:outline-none">
{{--                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">--}}
{{--                    <path d="M 3 5 A 1.0001 1.0001 0 1 0 3 7 L 21 7 A 1.0001 1.0001 0 1 0 21 5 L 3 5 z M 3 11 A 1.0001 1.0001 0 1 0 3 13 L 21 13 A 1.0001 1.0001 0 1 0 21 11 L 3 11 z M 3 17 A 1.0001 1.0001 0 1 0 3 19 L 21 19 A 1.0001 1.0001 0 1 0 21 17 L 3 17 z"></path>--}}
{{--                </svg>--}}
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
{{--                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 30 30">--}}
{{--                        <path d="M 7 4 C 6.744125 4 6.4879687 4.0974687 6.2929688 4.2929688 L 4.2929688 6.2929688 C 3.9019687 6.6839688 3.9019687 7.3170313 4.2929688 7.7070312 L 11.585938 15 L 4.2929688 22.292969 C 3.9019687 22.683969 3.9019687 23.317031 4.2929688 23.707031 L 6.2929688 25.707031 C 6.6839688 26.098031 7.3170313 26.098031 7.7070312 25.707031 L 15 18.414062 L 22.292969 25.707031 C 22.682969 26.098031 23.317031 26.098031 23.707031 25.707031 L 25.707031 23.707031 C 26.098031 23.316031 26.098031 22.682969 25.707031 22.292969 L 18.414062 15 L 25.707031 7.7070312 C 26.098031 7.3170312 26.098031 6.6829688 25.707031 6.2929688 L 23.707031 4.2929688 C 23.316031 3.9019687 22.682969 3.9019687 22.292969 4.2929688 L 15 11.585938 L 7.7070312 4.2929688 C 7.5115312 4.0974687 7.255875 4 7 4 z"></path>--}}
{{--                    </svg>--}}
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
                @auth
                    @if(auth()->user()->academic_year >= 5)
                        <x-nav-link href="{{ route('jobs.index') }}" :active="request()->routeIs('jobs.index')" class="text-white">
                            {{ __('menu.jobs') }}
                        </x-nav-link>
                    @endif
                @endauth
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

        document.getElementById('notification-toggle').addEventListener('click', function () {
            document.getElementById('notification-panel').classList.toggle('hidden');
        });
    </script>
</div>

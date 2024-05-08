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
    </script>
</div>

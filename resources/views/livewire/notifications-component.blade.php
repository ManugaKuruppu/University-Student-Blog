<div x-data="{ showPanel: @entangle('showPanel') }" class="container mx-auto">
    <div class="relative">
        <!-- Notification Icon -->
        <button @click="showPanel = !showPanel" class="focus:outline-none absolute right-0 mt-2 w-64">
{{--            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="64" height="64" viewBox="0 0 256 256" xml:space="preserve">--}}
                <defs></defs>
                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(49.50661478599223 49.5066147859922) scale(1.73 1.73)" >
                    <path d="M 62.238 59.916 H 27.762 c -2.066 0 -3.747 -1.681 -3.747 -3.747 c 0 -2.195 0.957 -4.271 2.626 -5.696 c 0.777 -0.664 1.223 -1.632 1.223 -2.654 V 35.135 C 27.865 25.687 35.552 18 45 18 s 17.136 7.687 17.136 17.135v 12.683 c 0 1.022 0.446 1.99 1.224 2.655 c 1.669 1.426 2.626 3.502 2.626 5.695 C 65.985 58.235 64.305 59.916 62.238 59.916 z M 28.024 55.916 h 33.952 c -0.067 -0.928 -0.502 -1.792 -1.215 -2.401 c -1.669 -1.426 -2.626 -3.502 -2.626 -5.696 V 35.135 C 58.136 27.893 52.243 22 45 22 c -7.243 0 -13.135 5.893 -13.135 13.135 v 12.683 c 0 2.193 -0.957 4.27 -2.625 5.696 C 28.525 54.124 28.091 54.988 28.024 55.916 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 39.918 64.884 c 0 0.011 -0.002 0.022 -0.002 0.033 C 39.916 67.724 42.192 70 45 70 s 5.084 -2.276 5.084 -5.084 c 0 -0.011 -0.002 -0.022 -0.002 -0.033" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                    <path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 4 C 22.393 4 4 22.393 4 45 s 18.393 41 41 41 s 41 -18.393 41 -41 S 67.607 4 45 4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                </g>
            </svg>
        </button>
        <!-- Notification Panel -->
        <div x-show="showPanel" class="notifications-panel absolute right-0 mt-0 w-64">
            @if (empty($notifications))
                <ul>
                    <li>
                        <strong>Title:</strong> Event <br>
                        <strong>Custom Data:</strong> Everyone
                    </li>
                </ul>
            @else
                <ul>
                    @foreach ($notifications as $notification)
                        <li>{{ $notification['data']['message'] }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

<x-app-layout title="Home Page">
    <head>
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    </head>
    @section('hero')
        <div class="w-full py-32 text-center" style="background-image: url('/img/bg.jpg'); background-size: cover; background-position: center;">
            <h1 class="text-2xl font-bold text-center text-white md:text-3xl lg:text-5xl">
                {{ __('home.hero.title') }} <span class="text-white-500">APIIT</span> <span class="text-white-900">
                    Blogs</span>
            </h1>
            <p class="mt-1 text-lg text-white">{{ __('home.hero.desc') }}</p>
            <a class="inline-block px-3 py-2 mt-5 text-lg text-white bg-gray-800 rounded" href="{{ route('posts.index') }}">
                {{ __('home.hero.cta') }}</a>
        </div>
    @endsection

    <div class="w-full mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500">{{ __('home.featured_posts') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Big Post (Left Side) -->
                <div class="col-span-1 md:col-span-1 flex justify-center">
                    <x-posts.post-card :post="$featuredPosts->first()" class="w-full" />
                </div>
                <!-- Small Posts (Right Side) -->
                <div class="col-span-1 md:col-span-1 md:flex md:flex-col md:justify-between">
                    @foreach ($featuredPosts->skip(1) as $post)
                        <div class="mb-4 md:mb-1">
                            <x-posts.post-card :post="$post" class="w-1/2 mx-auto" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <a class="block mt-10 text-lg font-semibold text-center text-yellow-500" href="{{ route('posts.index') }}">
            {{ __('home.more_posts') }}</a>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500">{{ __('home.latest_posts') }}</h2>
        <div class="w-full mb-5">
            <div class="owl-carousel owl-theme" data-slideby="3"> <!-- Set slideBy option to 3 -->
                @foreach ($latestPosts as $post)
                    <div class="item">
                        <x-posts.post-card :post="$post" />
                    </div>
                @endforeach
            </div>
        </div>
        <a class="block mt-10 text-lg font-semibold text-center text-yellow-500" href="{{ route('posts.index') }}">
            {{ __('home.more_posts') }}</a>
    </div>

    <!-- Owl Carousel JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:3000,
                slideBy:3, // Slide by 3 posts
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:3
                    }
                }
            });
        });
    </script>
</x-app-layout>

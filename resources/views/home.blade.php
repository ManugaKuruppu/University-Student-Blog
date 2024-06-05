<x-app-layout title="Home Page">
    <head>
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('css/home/home.css') }}">
        <style>
            .owl-carousel .owl-item img {
                width: 100%;
                height: auto;
            }
        </style>
    </head>
    @section('hero')
        <div class="banner">
            <!-- Add your banner image here -->
            <img src="{{ asset('img/banner3.jpg') }}" alt="background">
            <div class="animated-text">
                <div class="apiit">APIIT</div>
                <div class="blogs">Blogs</div>
            </div>
        </div>
        <div class="wrapper">
            <div class="container1">
                <input type="radio" name="slider" id="c1" checked>
                <input type="radio" name="slider" id="c2">
                <input type="radio" name="slider" id="c3">
                <input type="radio" name="slider" id="c4">

                <label for="c1" class="card" id="card1">
                    <div class="row">
                        <div class="icon">1</div>
                        <div class="description">
                            <h4>APIIT City Cmpus </h4>
                            <p>388, Union Place, Colombo 2, Sri Lanka.</p>
                        </div>
                    </div>
                </label>

                <label for="c2" class="card" id="card2">
                    <div class="row">
                        <div class="icon">2</div>
                        <div class="description">
                            <h4>APIIT Foundation Studies</h4>
                            <p>DNo 278,Access Towers 2, Union Place,, Colombo 2.</p>
                        </div>
                    </div>
                </label>

                <label for="c3" class="card" id="card3">
                    <div class="row">
                        <div class="icon">3</div>
                        <div class="description">
                            <h4>APIIT Kandy Campus</h4>
                            <p>542 Peradeniya Rd, Kandy 20000</p>
                        </div>
                    </div>
                </label>

                <label for="c4" class="card" id="card4">
                    <div class="row">
                        <div class="icon">4</div>
                        <div class="description">
                            <h4>APIIT City Campus </h4>
                            <p>388, Union Place, Colombo 2, Sri Lanka.</p>
                        </div>
                    </div>
                </label>
            </div>
        </div>
    @endsection

    <div class="w-full mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500">{{ __('Featured Posts') }}</h2>
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
            {{ __('explore more posts...') }}</a>
        <hr>
<br><br><br>
        <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-500">{{ __('Latest Posts') }}</h2>
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
            {{ __('explore more posts...') }}</a>

    </div>


{{--    <section class="blog-section">--}}
{{--        <div class="blog-box">--}}
{{--            <div class="icon-container">--}}
{{--                <i class="fas fa-pencil-alt"></i>--}}
{{--            </div>--}}
{{--            <h3>Who can post?</h3>--}}
{{--            <p>Anyone with a passion for writing and sharing their thoughts can contribute to our blog.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-box">--}}
{{--            <div class="icon-container">--}}
{{--                <i class="fas fa-calendar-alt"></i>--}}
{{--            </div>--}}
{{--            <h3>Get updated for the Events</h3>--}}
{{--            <p>Stay informed about the latest events and happenings within our community.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-box">--}}
{{--            <div class="icon-container">--}}
{{--                <i class="fas fa-question-circle"></i>--}}
{{--            </div>--}}
{{--            <h3>Have any Questions?</h3>--}}
{{--            <p>Reach out to us with any inquiries you might have, and we'll get back to you promptly.</p>--}}
{{--        </div>--}}
{{--        <div class="blog-box">--}}
{{--            <div class="icon-container">--}}
{{--                <i class="fas fa-briefcase"></i>--}}
{{--            </div>--}}
{{--            <h3>Opportunities await you!</h3>--}}
{{--            <p>Discover exciting opportunities and take the next step in your career with our resources.</p>--}}
{{--        </div>--}}
{{--    </section>--}}


    <!-- Owl Carousel JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/home/home.js') }}"></script>

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

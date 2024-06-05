<footer class="flex flex-wrap items-center justify-between px-4 py-4 text-sm border-t border-gray-100">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        footer {
            background-color: white;
            color: black;
            padding: 1.5rem 0;
        }

        .container2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Contact Us Styles */
        .contact {
            /* Add styles for contact information */
            /* Example: font size, margin, padding, etc. */
        }

        /* Links Styles */
        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul li {
            display: inline-block;
            margin-right: 1rem;
        }

        a {
            color: black;
        }

        /* Hover Effect */
        a:hover {
            color: #ddd; /* Change to your desired hover color */
        }
    </style>

    <div class="container2 mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div style="margin-right: 50px">
            <img src="{{ asset('img/logonew.png') }}" alt="Logo" style="width: 200px;">
        </div>

        <!-- Contact Us -->
        <div style="margin-left: 50px; font-size: 25px">
            <h3 class="text-lg font-semibold mb-2">Contact Us</h3>
            <ul class="flex">
                <!-- Gmail -->
                <li class="mr-3">
                    <a href="mailto:youremail@gmail.com" target="_blank" class="hover:text-gray-300">
                        <i class="fab fa-google mr-1"></i> Gmail
                    </a>
                </li>
                <!-- Facebook -->
                <li class="mr-3">
                    <a href="https://www.facebook.com/yourpage" target="_blank" class="hover:text-gray-300">
                        <i class="fab fa-facebook mr-1"></i> Facebook
                    </a>
                </li>
                <!-- Instagram -->
                <li>
                    <a href="https://www.instagram.com/yourprofile" target="_blank" class="hover:text-gray-300">
                        <i class="fab fa-instagram mr-1"></i> Instagram
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
{{--<head>--}}

{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

{{--</head>--}}

{{--<footer>--}}
{{--    <div class="footerContainer">--}}
{{--        <div class="socialIcons">--}}
{{--            <a href=""><i class="fa-brands fa-facebook"></i></a>--}}
{{--            <a href=""><i class="fa-brands fa-instagram"></i></a>--}}
{{--            <a href=""><i class="fa-brands fa-twitter"></i></a>--}}
{{--            <a href=""><i class="fa-brands fa-google-plus"></i></a>--}}
{{--            <a href=""><i class="fa-brands fa-youtube"></i></a>--}}
{{--        </div>--}}
{{--        <div class="footerNav">--}}
{{--            <ul><li><a href="">Home</a></li>--}}
{{--                <li><a href="">News</a></li>--}}
{{--                <li><a href="">About</a></li>--}}
{{--                <li><a href="">Contact Us</a></li>--}}

{{--            </ul>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <div class="footerBottom">--}}
{{--        <center><img src="{{ asset('img/logonew.png') }}" alt="Logo" width="300px" height="50px"></center>--}}
{{--        <p> 2024 Apiit Lanka. All rights reserved. <span class="designer">#APIIT</span></p>--}}
{{--    </div>--}}
{{--</footer>--}}
{{--<style>--}}
{{--    footer{--}}
{{--        background-color: #737171;--}}
{{--    }--}}
{{--    .footerContainer{--}}
{{--        width: 100%;--}}
{{--        /*padding: 50px 20px 15px ;*/--}}
{{--        padding: 5px;--}}
{{--    }--}}
{{--    .socialIcons{--}}
{{--        display: flex;--}}
{{--        justify-content: center;--}}
{{--    }--}}
{{--    .socialIcons a{--}}
{{--        text-decoration: none;--}}
{{--        padding:  10px;--}}
{{--        background-color: white;--}}
{{--        margin: 10px;--}}
{{--        border-radius: 50%;--}}
{{--    }--}}
{{--    .socialIcons a i{--}}
{{--        font-size: 2em;--}}
{{--        color: black;--}}
{{--        opacity: 0,9;--}}
{{--    }--}}
{{--    /* Hover affect on social media icon */--}}
{{--    .socialIcons a:hover{--}}
{{--        background-color: #111;--}}
{{--        transition: 0.5s;--}}
{{--    }--}}
{{--    .socialIcons a:hover i{--}}
{{--        color: white;--}}
{{--        transition: 0.5s;--}}
{{--    }--}}
{{--    .footerNav{--}}
{{--        margin: 30px 0;--}}
{{--    }--}}
{{--    .footerNav ul{--}}
{{--        display: flex;--}}
{{--        justify-content: center;--}}
{{--        list-style-type: none;--}}
{{--    }--}}
{{--    .footerNav ul li a{--}}
{{--        color: #090909;--}}
{{--        margin: 20px;--}}
{{--        text-decoration: none;--}}
{{--        font-size: 1.3em;--}}
{{--        opacity: 0.7;--}}
{{--        transition: 0.5s;--}}

{{--    }--}}
{{--    .footerNav ul li a:hover{--}}
{{--        opacity: 1;--}}
{{--    }--}}
{{--    .footerBottom{--}}
{{--        background-color: #b0b0b0;--}}
{{--        /*padding: 10px;*/--}}
{{--        text-align: center;--}}
{{--    }--}}
{{--    .footerBottom p{--}}
{{--        color: #101010;--}}
{{--    }--}}
{{--    .designer{--}}
{{--        opacity: 0.7;--}}
{{--        text-transform: uppercase;--}}
{{--        letter-spacing: 1px;--}}
{{--        font-weight: 400;--}}
{{--        margin: 0px 5px;--}}
{{--    }--}}
{{--    .p{--}}

{{--    }--}}
{{--    @media (max-width: 700px){--}}
{{--        .footerNav ul{--}}
{{--            flex-direction: column;--}}
{{--        }--}}
{{--        .footerNav ul li{--}}
{{--            width:100%;--}}
{{--            text-align: center;--}}
{{--            margin: 10px;--}}
{{--        }--}}
{{--        .socialIcons a{--}}
{{--            padding: 8px;--}}
{{--            margin: 4px;--}}
{{--        }--}}
{{--    }--}}
{{--</style>--}}

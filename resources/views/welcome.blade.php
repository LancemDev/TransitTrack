<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body>
        <header>
            <nav>
                {{-- Brand Logo --}}
                <div class="logo">
                    <a href="{{ url('/')}}">TransitTrack</a>
                </div>

                <div class="links">
                    <a href="{{ url('/')}}">Home</a>
                    <a href="About-Us">About Us</a>
                    <a href="Traffic-Highlights">Traffic Highlights</a>
                    <a href="Contact-Us">Get In Touch</a>
                    <a href="#">
                        <button class="login">Login</button>
                    </a>
                </div>
{{-- 
                <!-- Mobile menu button -->
                <div>
                    <button type="button" aria-label="toggle menu"> 
                        <i class="uil uil-bars"></i>
                    </button>
                </div>

                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div>
                    <a href="{{ url('/')}}">Home</a>
                    <a href="About-Us">About Us</a>
                    <a href="Traffic-Highlights">Traffic Highlights</a>
                    <a href="Contact-Us">Get In Touch</a>
                    <a href="#">Login</a>
                </div> --}}
            </nav>
        
            <section>
                <div>
                    <p class="above_title">Lorem ipsum dolor</p>
                    <h2 class="above_phrase">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit</h2>
        
                    <div>
                        <a href="#">Get Started</a>
                    </div>
                </div>
            </section>
        </header>  
    </body>
</html>
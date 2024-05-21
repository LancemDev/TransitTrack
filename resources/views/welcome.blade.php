<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>

    <body>
        <header >
            <nav>
                <div>
                    <a href="#">Brand</a>
        
                    <!-- Mobile menu button -->
                    <div>
                        <button type="button" aria-label="toggle menu"> 
                        </button>
                    </div>
                </div>
        
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div>
                    <a href="#">Home</a>
                    <a href="#">#</a>
                    <a href="#">#</a>
                    <a href="#">#</a>
                    <a href="#">Get In Touch</a>
                </div>
            </nav>
        
            <section>
                <div>
                    <p>Lorem ipsum dolor</p>
                    <h2>Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit</h2>
        
                    <div>
                        <a href="#">Get In Touch</a>
                    </div>
                </div>
            </section>
        </header>  
    </body>
</html>
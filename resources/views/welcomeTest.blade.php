<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
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

                {{-- <!-- Mobile menu button -->
                <div @click="isOpen = !isOpen" class="flex md:hidden">
                    <button type="button" class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                            <path fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                            </path>
                        </svg>
                    </button>
                </div>
    
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div :class="isOpen ? 'flex' : 'hidden'"
                    class="flex-col mt-2 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-indigo-400"
                        href="#">Home</a>
                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-indigo-400"
                        href="#">About Us</a>
                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-indigo-400"
                        href="#">Traffic Highlights</a>
                    <a class="text-sm font-medium text-gray-200 transition-colors duration-300 transform hover:text-indigo-400"
                        href="#">Get Started</a>
                    <a class="px-4 py-1 text-sm font-medium text-center text-gray-200 transition-colors duration-300 transform border rounded hover:bg-indigo-400"
                        href="#">Login</a>
                </div> --}}
            </nav>
        
            <section class="hero-cta overlay flex items-center justify-center" style="height: 500px;">
                <div class="text-center">
                    <h2 class="mt-6 mb-6 text-xl font-bold text-white md:text-5xl">Who are we?</h2>
                    <p class="kaushan-script-regular text-3xl tracking-wider text-gray-300">Efficient and Convinient Public Transportation for Everyone</p>
                    
        
                    <div class="flex justify-center mt-8">
                        <a class="px-8 py-2 text-lg font-medium text-white transition-colors duration-300 transform bg-indigo-600 rounded hover:bg-indigo-500"
                            href="#">Get Started</a>
                    </div>
                </div>
            </section>
        </header> 
        
        
        
        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto space-y-8 md:flex md:items-center md:space-y-0">
                <div class="md:w-2/3">
                    <div class="hidden md:flex md:items-center md:space-x-10">
                        <img class="object-cover object-center rounded-md shadow w-72 h-72"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <img class="object-cover object-center w-64 rounded-md shadow h-96"
                            src="https://images.unsplash.com/photo-1618506469810-282bef2b30b3?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80">
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800 md:mt-6">Lorem ipsum dolor </h2>
                    <p class="max-w-lg mt-4 text-gray-600">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse illum
                        dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia
                        deserunt mollit anim id est laborum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.
                    </p>
                </div>
                <div class="md:w-1/3">
                    <img class="object-cover object-center w-full rounded-md shadow" style="height: 700px;"
                        src="https://images.unsplash.com/photo-1593352216840-1aee13f45818?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                </div>
            </div>
        </section>
        
        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto text-center">
                <h2 class="text-3xl font-semibold text-gray-800">Our Leadership</h2>
                <p class="max-w-lg mx-auto mt-4 text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum
                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>
        
                <div class="grid gap-8 mt-6 md:grid-cols-2 lg:grid-cols-4">
                    <div>
                        <img class="object-cover object-center w-full h-64 rounded-md shadow"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <h3 class="mt-2 font-medium text-gray-700">John Doe</h3>
                        <p class="text-sm text-gray-600">CEO</p>
                    </div>
        
                    <div>
                        <img class="object-cover object-center w-full h-64 rounded-md shadow"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <h3 class="mt-2 font-medium text-gray-700">John Doe</h3>
                        <p class="text-sm text-gray-600">CEO</p>
                    </div>
        
                    <div>
                        <img class="object-cover object-center w-full h-64 rounded-md shadow"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <h3 class="mt-2 font-medium text-gray-700">John Doe</h3>
                        <p class="text-sm text-gray-600">CEO</p>
                    </div>
        
                    <div>
                        <img class="object-cover object-center w-full h-64 rounded-md shadow"
                            src="https://images.unsplash.com/photo-1614030126544-b79b92e29e98?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80">
                        <h3 class="mt-2 font-medium text-gray-700">John Doe</h3>
                        <p class="text-sm text-gray-600">CEO</p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
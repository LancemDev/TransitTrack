<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
        <style>
            ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
        </style>
    </head>
    <body>

    <!-- ABOVE THE FOLD -->
    <div>
        <header class="bg-gray-800 bg-img" x-data="{ isOpen: false }">
            <nav class="">
                <div class="flex items-center justify-between">
                    <a class="logo-font font-bold text-black transition-colors duration-300 transform md:text-2xl hover:text-white"
                    href="{{ url('/')}}"><i class="uil uil-bus-alt"></i>TransitTrack<i class="uil uil-mobile-android"></i></a>
        
                    <!-- Mobile menu button -->
                    {{-- <div @click="isOpen = !isOpen" class="flex md:hidden">
                        <button type="button" class="text-gray-200 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                            aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg>
                        </button>
                    </div> --}}
                </div>
        
                <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                <div 
                {{-- :class="isOpen ? 'flex' : 'hidden'" --}}
                    class="links">
                    <a class="font-medium text-black transition-colors duration-300 transform hover:text-white"
                        href="{{ url('/')}}">Home</a>
                    <a class="font-medium text-black transition-colors duration-300 transform hover:text-white"
                        href="#about-us">About Us</a>
                    <a class="font-medium text-black transition-colors duration-300 transform hover:text-white"
                        href="#">Traffic Highlights</a>
                    <a class="font-medium text-black transition-colors duration-300 transform hover:text-white"
                        href="#">Get In Touch</a>
                    @if(auth()->check())
                        @if(auth()->guard('admin')->check())
                            <a class="px-5 py-3 text-center text-black transition-colors duration-300 transform border rounded hover:bg-white"
                               href="{{ route('admin.home') }}">Dashboard</a>
                        @elseif(auth()->guard('web')->check())
                            <a class="px-5 py-3 text-center text-black transition-colors duration-300 transform border rounded hover:bg-white"
                               href="{{ route('user.home') }}">Dashboard</a>
                        @elseif(auth()->guard('driver')->check())
                            <a class="px-5 py-3 text-center text-black transition-colors duration-300 transform border rounded hover:bg-white"
                               href="{{ route('driver.home') }}">Dashboard</a>
                        @elseif(auth()->guard('sacco_admin')->check())
                            <a class="px-5 py-3 text-center text-black transition-colors duration-300 transform border rounded hover:bg-white"
                               href="{{ route('sacco.home') }}">Dashboard</a>
                        @endif
                    @else
                        <a class="px-5 py-3 text-center text-black transition-colors duration-300 transform border rounded hover:bg-white"
                           href="{{ url('/login')}}">Login</a>
                    @endif
                </div>
            </nav>
        
            <section class="flex items-center justify-center" style="height: 600px;">
                <div class="text-center">
                    <h2 class="mt-6 mb-6 text-3xl font-bold text-white md:text-5xl kaushan-script-regular">TransitTrack</h2>
                    <p class="ml-10 text-3xl font-bold tracking-wider text-white"> Efficient and Convenient Public Transportation for Everyone</p>
        
                    <div class="flex justify-center mt-8">
                        <a class="px-10 py-5 text-lg font-medium text-white transition-colors duration-300 transform bg-black rounded hover:action-call"
                            href="{{ url('/register') }}">Get Started</a>
                    </div>
                </div>
            </section>
        </header>
        
        {{-- ABOUT US SECTION --}}
        <section class="bg-white" id="about-us">
            <div class="title-text">
                <p>Who Are We?</p>
                <hr>
            </div>

            <div class="about-us max-w-7xl px-6 py-16 mx-auto">
                <p>Welcome to TransitTrack, where we revolutionize the way you experience public transportation.
                Our mission is to make public transit more efficient, reliable, and convenient for both drivers and passengers.</p>
                <br>
                <b>Our Commitment</b>
                <p>
                    At TransitTrack, we are dedicated to creating a seamless public transportation experience.
                    We continuously innovate and improve our platform based on your feedback and the latest technology trends. 
                    Our goal is to build a connected community where public transit is a reliable and preferred choice for everyone.
                </p>
            </div>

            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <h3 class="text-4xl font-semibold text-gray-800">Drivers</h3>
                        <p class="text-2xl max-w-md mt-4 text-gray-600">Show where you are to your potential passengers, and clock in and out of work.</p>
                        <a href="#" class="block mt-8 text-indigo-700 underline">Start</a>
                    </div>
        
                    <div class="mt-8 md:mt-0 md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                    src="https://images.unsplash.com/photo-1604616410903-390e7118a3e1?q=80&w=1587&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="items-center md:flex md:space-x-6">
                    <div class="md:w-1/2">
                        <div class="flex items-center justify-center">
                            <div class="max-w-md">
                                <img class="object-cover object-center w-full rounded-md shadow" style="height: 500px;"
                                    src="https://images.unsplash.com/photo-1604232078618-0a643e60cdcb?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                            </div>
                        </div>
                    </div>
        
                    <div class="mt-8 md:mt-0 md:w-1/2">
                        <h3 class="text-4xl font-semibold text-gray-800">Passengers</h3>
                        <p class="text-2xl max-w-md mt-4 text-gray-600">View live matatu positions and any other incoming traffic</p>
                        <a href="#" class="block mt-8 text-indigo-700 underline">View</a>
                    </div>
                </div>
            </div>

            <div class="max-w-5xl px-6 py-16 mx-auto text-center">
                <h2 class="text-3xl font-semibold text-gray-800">Public Transport Cooperative</h2>
                <p class="max-w-lg mx-auto mt-4 text-gray-600">Perform various transportation functions such as fleet maintenance, administration, and dispatching, for multiple human service agencies in an efficient and satisfactory interface.</p>
        
                <img class="object-cover object-center w-full mt-16 rounded-md shadow h-80"
                    src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhdrB4REND-i4EUqps2t9q2x286gOsOG6juOl8M-Yf7QZIdY5FpyYoFgcMqetVmXlJ7lU8bJ4SdvLhH18TsZk5Rf927dORRwsAloSqgP_wAs9CfXouvvDuNYPvSCrEjMa_XwotMG9PqkUMA/s1024/fuso_modern_puv_01.jpg">
            </div>
        </section>
        
        <div class="break"></div>

        {{-- TESTIMONIALS SECTIONS --}}
        <section class="bg-white">

            <div class="title-text">
                <p>Testimonials</p>
                <hr>
                <br>

            </div>

            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="md:flex md:justify-between">
                    <h2 class="text-3xl font-semibold text-gray-800">What do our users say about us?</h2>
                </div>
        
                <div class="grid gap-8 mt-10 md:grid-cols-2 lg:grid-cols-3">
                    <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                        <img class="profile-img" src="https://images.unsplash.com/photo-1582793770580-4cde3de01a62?q=80&w=1928&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="passenger profile image">
                        <h2 class="text-xl font-medium text-gray-800">Anna</h2>
                        Passenger
                        <p class="text-xl max-w-md mt-4 text-gray-700">“It has made accessing matatus so convenient and sped up my day so much”</p>
                    </div>

                    <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                        <img class="profile-img" src="https://plus.unsplash.com/premium_photo-1682147745920-d2f4e30d9999?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="passenger profile image">
                        <h2 class="text-xl font-medium text-gray-800">Chad</h2>
                        Driver
                        <p class="text-xl max-w-md mt-4 text-gray-700">“It is so much easier to find passengers when on-route with this”</p>
                    </div>

                    <div class="px-6 py-8 overflow-hidden bg-white rounded-md shadow-md">
                        <img class="profile-img" src="https://pbs.twimg.com/media/Fv0xpdOWcAAxj_G?format=jpg&name=small" alt="passenger profile image">
                        <h2 class="text-xl font-medium text-gray-800">Metro Trans</h2>
                        Public Transport Cooperative
                        <p class="text-xl max-w-md mt-4 text-gray-700">“Makes managing our drivers and vehicles easy and very efficient.”</p>
                    </div>
        
                </div>
            </div>
        </section>

        {{-- REPEATING CALL TO ACTION --}}
        <section class="bg-white">
            <div class="max-w-5xl px-6 py-16 mx-auto">
                <div class="px-10 py-20 bg-gray-800 flex-col justify-center rounded-md md:px-20 md:flex md:items-center md:justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold text-white">Your personal public transport partner</h3>
                        <p class="max-w-md mt-4 ml-28 text-gray-400">Ready to work with us?</p>
                    </div>
        
                    <a class="block px-8 py-2 mt-6 mr-8 text-lg font-medium text-center text-white transition-colors duration-300 transform bg-gray-400 rounded md:mt-0 hover:bg-black"
                        href="#">Get Started</a>
                </div>
            </div>
        </section>
        
        <footer class="border-t">
            <div class="container flex items-center justify-between px-6 py-8 mx-auto">
                <p class="text-gray-500">© 2019-2021 All Rights Reserved.</p>
                <p class="font-medium text-gray-700">Terms of Service</p>
            </div>
        </footer>
    </div>
    </body>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</html>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a brief description of the content of your web page.">
    <link rel="icon" href="/assets/logo/icon-logo.png">
    <title>{{ config('app.name', 'eShop') }}</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body>
    <!-- Navbar goes here -->
    <nav class="bg-white shadow-lg sticky top-0 z-10 w-full">
        <div class="max-w-8xl mx-auto px-4 ">
            <div class="flex justify-between">
                <div class="flex space-x-7">

                    <!-- Primary Navbar items -->
                    <div class="hidden md:flex items-center space-x-1">
                        <a class="py-4 text-gray-700 text-2xl font-bold px-20">eShop</a>
                        <a href="#"
                            class="py-4 text-gray-700 lg:text-2xl md:text-xl lg:font-bold md:font-medium border-2 border-t-0 border-purple-500  transition duration-300 px-20">Say
                            Hi, <span class="underline">Mr. Lema Portfolio</span></a>
                    </div>
                </div>
                <!-- Secondary Navbar items -->
                @if (Route::has('login'))
                    <div class="hidden md:flex items-center space-x-3 px-10">
                        @auth
                            <a href="{{ url('/home') }}"
                                class="py-2 px-8 font-medium text-white bg-red-500 00 transition duration">Dashboard</a>
                        @else
                            <a href="{{ url('login') }}"
                                class="py-2 px-4 font-medium text-gray-500 rounded hover:border border-purple-500  transition duration-300">Log
                                In</a>

                            @if (Route::has('register'))
                                <a href="{{ url('register') }}"
                                    class="py-2 px-8 font-medium text-white bg-gray-700 rounded hover:bg-purple-500 transition duration-300">Sign
                                    Up</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

        </div>
        </div>
        <!-- mobile menu -->
    </nav>

    <nav style="margin-top: 30px; padding-bottom: 20px" x-data="{ isOpen: false }" class="relative max-w-7xl mx-auto ">
        <div class="container px-6 mx-auto md:flex">
            <div class="flex items-center justify-between">
                <a href="/">
                    <img class="lg:w-30 lg:h-16  sm:w-16 h-10" src="{{ asset('assets/logo/shopping-cart-logo.png') }}"
                        alt="logo">
                </a>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden md:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->

            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="shadow-lg md:shadow-none lg:shadow-none sm:shadow-lg absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out  md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                <div
                    class=" bg-gray-50 md:bg-transparent lg:bg-transparent sm:bg-gray-50 flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">
                    <a href="{{ url('register') }}"
                        class="bg-none px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg  hover:text-gray-500   md:mx-2">Get
                        in touch</a>
                    <a href="{{ 'get-in-touch' }}"
                        class=" px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg  hover:text-gray-500  md:mx-2">Stay
                        Connected</a>
                    <a href="{{ 'contact' }}"
                        class=" px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg  hover:text-gray-500  md:mx-2">Contact
                        Us</a>
                    <a href="{{ url('login') }}"
                        class="lg:hidden md:hidden py-2 px-4 font-medium text-gray-500 rounded hover:text-gray-400  transition duration-300">Log
                        In</a>
                    <a href="{{ url('register') }}"
                        class="lg:hidden md:hidden py-2 px-8 font-medium text-white bg-gray-700 rounded hover:bg-purple-500 transition duration-300">Sign
                        Up</a>
                    <div class="flex justify-center">
                    </div>
                </div>
                <form action="{{ route('welcome.search') }}" method="GET">
                    <div class="relative md:mt-0 sm:mt-0">
                        <button type="submit">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-5 h-5 text-gray-400" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </button>

                        <input type="search" name="query"
                            class="w-full py-2 pl-10 pr-4 mb-5 text-gray-700 border rounded-lg dark:bg-white dark:text-gray-700 dark:border-gray-600 focus:border-purple-400 dark:focus:border-purple-300 focus:outline-none focus:ring focus:ring-opacity-20 focus:ring-purple-400"
                            title="search over 45+ products" placeholder="Search" required>
                    </div>
            </div>
            <button type="submit"
                class=" hidden mx-4 text-white transition-colors duration-300 transform lg:block dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-400 focus:text-gray-700 dark:focus:text-gray-400 focus:outline-none"
                aria-label="show notifications">
                <span
                    class="bg-purple-500 absolute inset-y-0 left-0 flex mt-6 mb-5 pl-3 pr-3 items-center rounded hover:bg-purple-400">
                    <svg class="w-6 h-6 text-white hover:text-gray-100" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                </span>
            </button>
            </form>
        </div>
    </nav>
    <hr>
    <!-- END Navbar Section: Toggle true-->

    <!-- Product List Section: Categories Grid -->
    <div class="bg-white dark:text-gray-100 dark:bg-white-900">
        <div class="container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
            @if (isset($status))
                    <div class="bg-purple-500 p-4 flex justify-center items-center">

                        <p class=" ml-3 text-sm font-bold text-white">{{ $status }}</p>
                    </div>
                @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                    @foreach ($results as $result)
                        <a href="{{ route('checkout.show', $result->id) }}"
                            class="sm:col-span-2 md:col-span-1 block group relative transition ease-out active:opacity-75 overflow-hidden">
                            <img src="{{ Storage::url($result->featured_image) }}" alt="{{ $result->title }} "
                                alt="Product Image"
                                class="h-full w-full object-fill transform transition ease-out group-hover:scale-110">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-25 transition ease-out group-hover:bg-opacity-0">
                            </div>
                            <div class="p-4 flex items-center justify-center absolute inset-0">
                                <div
                                    class="py-3 px-4 bg-white bg-opacity-95 rounded-3xl text-sm font-semibold uppercase tracking-wide transition ease-out group-hover:text-white group-hover:bg-purple-600 dark:bg-gray-900/90 dark:border-gray-800">
                                    {{ $result->title }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- End Product List Section: Categories Grid -->

    <!-- footer-->
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"
                    class="w-10 h-10 text-white p-2 bg-purple-500 rounded-full" viewBox="0 0 24 24">
                    <image class="w-6 h-7 text-white p-2 bg-purple-500 rounded-full object-cover" viewBox="0 0 24 24"
                        id="img1" href="/assets/logo/logo-bl.svg" />
                </svg>

                <span class="ml-3 text-xl">eShop</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©
                2023 Codewithlema —
                <a class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@Mr. Lema</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
                <a class="text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        class="w-5 h-5" viewBox="0 0 24 24">
                        <path
                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                        </path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5"
                            ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
                <a class="ml-3 text-gray-500">
                    <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                        <path stroke="none"
                            d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                        </path>
                        <circle cx="4" cy="4" r="2" stroke="none"></circle>
                    </svg>
                </a>
            </span>
        </div>
    </footer>
    <!-- End footer-->

    <!-- About Section  -->
    <!-- End About Section  -->

    <!-- Contact Section  -->
    <!-- End Contact Section  -->

    <!-- Back to top button -->
    <button id="to-top-button" onclick="goToTop()"
        class="hidden fixed z-90 bottom-8 right-8 border-0 w-14 h-14 rounded-full drop-shadow-md bg-purple-500 text-white text-3xl font-bold">&uarr;</button>
    <!-- End Back to top button  -->

    <!-- Script! back to top -->
    <script>
        var toTopButton = document.getElementById("to-top-button");

        // When the user scrolls down 200px from the top of the document, show the button
        window.onscroll = function() {
            if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
                toTopButton.classList.remove("hidden");
            } else {
                toTopButton.classList.add("hidden");
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function goToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>
    <!-- End Script! back to top -->

</body>

</html>

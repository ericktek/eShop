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
    <style>
        .puprle {
            color: #8d27d5;
        }

        .gray {
            color: #006aff;
        }

        .dark-purple {
            color: #f50be5;
        }
    </style>
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
                    <img class="lg:w-30 lg:h-16  sm:w-16 h-10" src="{{ asset('assets/logo/shopping-cart-logo.png') }}" alt="logo">
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
                    <a href="{{ url('get-in-touch') }}"
                        class=" px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg  hover:text-gray-500  md:mx-2">Stay
                        Connected</a>
                    <a href="{{ url('contact') }}"
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
                <h1 class="font-serif lg:text-2xl md:text-base flex sm:text-sm  items-center justify-center pt-4"><span
                 id="text"   class="text-purple-500 lg:text-2xl sm:text-sm ">free delivery</span>&nbsp; Any where</h1>


    </nav>
    <hr>
    <!-- END Navbar Section: Toggle true-->

    <!-- stay-connected: section -->
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-12">
        <div class="grid gap-10 lg:grid-cols-2">
            <div class="flex flex-col justify-center md:pr-8 xl:pr-0 lg:max-w-lg">
                <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-teal-accent-400">
                    <svg class="text-teal-900 w-7 h-7" viewBox="0 0 24 24">
                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-miterlimit="10" points=" 8,5 8,1 16,1 16,5" stroke-linejoin="round"></polyline>
                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-miterlimit="10" points="9,15 1,15 1,5 23,5 23,15 15,15" stroke-linejoin="round">
                        </polyline>
                        <polyline fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-miterlimit="10" points="22,18 22,23 2,23 2,18" stroke-linejoin="round"></polyline>
                        <rect x="9" y="13" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-miterlimit="10" width="6" height="4"
                            stroke-linejoin="round"></rect>
                    </svg>
                </div>
                <div class="max-w-xl mb-6">
                    <h2
                        class="max-w-lg mb-6 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                        Our aim is to provide<br class="hidden md:block" />
                        the highest-quality
                        <span class="inline-block text-deep-purple-accent-400">product</span>
                    </h2>
                    <p class="text-base text-gray-700 md:text-lg">
                        eShop, your premier e-commerce platform for electronic products, is dedicated to providing
                        top-notch customer service and ensuring your shopping experience is seamless and enjoyable. Dive
                        into our vast selection of electronics and embark on a journey into the future of technology
                        with eShop </p>
                </div>
                <div>
                    <a href="/" aria-label=""
                        class="inline-flex items-center font-semibold transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                        Take Me In
                        <svg class="inline-block w-3 ml-2" fill="currentColor" viewBox="0 0 12 12">
                            <path
                                d="M9.707,5.293l-5-5A1,1,0,0,0,3.293,1.707L7.586,6,3.293,10.293a1,1,0,1,0,1.414,1.414l5-5A1,1,0,0,0,9.707,5.293Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center -mx-4 lg:pl-8">
                <div class="flex flex-col items-end px-3">
                    <img class="object-cover mb-6 rounded shadow-lg h-28 sm:h-48 xl:h-56 w-28 sm:w-48 xl:w-56"
                        src="/assets/image-about/game.jpg" alt="product-medium" />
                    <img class="object-cover w-20 h-20 rounded shadow-lg sm:h-32 xl:h-40 sm:w-32 xl:w-40"
                        src="/assets/image-about/pod.png" alt="product-small" />
                </div>
                <div class="px-3">
                    <img class="object-cover w-40 h-40 rounded shadow-lg sm:h-64 xl:h-80 sm:w-64 xl:w-80"
                        src="/assets/image-about/mouse.jpg" alt="product-large" />
                </div>
            </div>
        </div>
    </div>
    <!-- End get-into-touch: component -->





    <!-- footer: section-->
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

    <!-- Slider section: scripts -->

    <script>
        // JavaScript to handle the swipe left effect
        const content = document.getElementById('content');
        const swipeButton = document.getElementById('swipeButton');
        let isContentVisible = true;

        swipeButton.addEventListener('click', () => {
            isContentVisible = !isContentVisible;

            if (isContentVisible) {
                content.style.transform = 'translateX(0%)'; // Show the content
            } else {
                content.style.transform = 'translateX(-100%)'; // Hide the content
            }
        });
    </script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
    <!--End slider section: scripts -->


    <!-- Our partiner: scripts -->

    <script>
        const words = ["Free ..", "Delivery ..", "Free!"],
            colors = ["purple", "gray", "dark-purple"],
            text = document.querySelector("#text");

        // Generator (iterate from 0-3)
        function* generator() {
            var index = 0;
            while (true) {
                yield index++;

                if (index > 3) {
                    index = 0;
                }
            }
        }

        // Printing effect
        function printChar(word) {
            let i = 0;
            text.innerHTML = "";
            text.classList.add(colors[words.indexOf(word)]);
            let id = setInterval(() => {
                if (i >= word.length) {
                    deleteChar();
                    clearInterval(id);
                } else {
                    text.innerHTML += word[i];
                    i++;
                }
            }, 600);
        }

        // Deleting effect
        function deleteChar() {
            let word = text.innerHTML;
            let i = word.length - 1;
            let id = setInterval(() => {
                if (i >= 0) {
                    text.innerHTML = text.innerHTML.substring(0, text.innerHTML.length - 1);
                    i--;
                } else {
                    text.classList.remove(colors[words.indexOf(word)]);
                    printChar(words[gen.next().value]);
                    clearInterval(id);
                }
            }, 300);
        }

        // Initializing generator
        let gen = generator();

        printChar(words[gen.next().value]);
    </script>
</body>

</html>

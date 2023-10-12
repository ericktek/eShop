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
                    id="text"    class="text-purple-500 lg:text-2xl sm:text-sm ">free delivery</span>&nbsp; Any where</h1>

            </div>
    </nav>
    <hr>
    <!-- END Navbar Section: Toggle true-->

    <!-- contact Section: get in touch-->

    <section class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-12">
        <div class="container px-8 py-10 mx-auto">
            <div class="lg:flex lg:items-center lg:-mx-10">
                <div class="lg:w-1/2 lg:mx-10">
                    <h1 class="text-2xl font-semibold text-purple-500 capitalize dark:text-purple- lg:text-3xl">Let’s
                        talk</h1>

                    <p class="mt-4 text-gray-500 dark:text-gray-400">
                        Ask us everything and we would love
                        to hear from you
                    </p>

                    <form action="/contact" method="POST" class="mt-12">
                        @csrf
                        <div class="-mx-2 md:items-center md:flex">
                            @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="flex-1 px-2">
                                <label class="block mb-2 text-sm text-gray-600 dark:text-gray-600">Full Name</label>
                                <input type="text" name="name" placeholder="Sele Dungamawe"
                                    class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-300 dark:bg-white dark:text-gray-700 dark:border-gray-700 focus:border-purple-400 dark:focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>

                            <div class="flex-1 px-2 mt-4 md:mt-0">
                                <label class="block mb-2 text-sm text-white-600 dark:text-gray-600">Email
                                    address</label>
                                <input type="email" name="subject" placeholder="seledungamawe@example.com"
                                    class="block w-full px-5 py-3 mt-2 text-white placeholder-gray-500 bg-white border border-gray-200 rounded-md dark:placeholder-gray-300 dark:bg-white dark:text-gray-700 dark:border-gray-700 focus:border-purple-400 dark:focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                            </div>
                        </div>

                        <div class="w-full mt-4">
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-600">Message</label>
                            <textarea name="message"
                                class="block w-full h-32 px-5 py-3 mt-2 text-white placeholder-gray-400 bg-white border border-gray-200 rounded-md md:h-56 dark:placeholder-gray-300 dark:bg-white dark:text-gray-700 dark:border-gray-700 focus:border-blue-400 dark:focus:border-purple-400 focus:ring-purple-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                placeholder="Message"></textarea>
                        </div>

                        <button type="submit"
                            class="w-full px-6 py-3 mt-4 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-purple-500 rounded-md hover:bg-purple-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">

                            Send Message
                        </button>
                    </form>
                </div>

                <div class="mt-12 lg:flex lg:mt-0 lg:flex-col lg:items-center lg:w-1/2 lg:mx-10">
                    <img class="hidden object-cover mx-auto rounded-full lg:block shrink-0 w-96 h-96"
                        src="/assets/image-about/staff-about.png" alt="CEO-Profile">

                    <div class="mt-6 space-y-8 md:mt-8">
                        <p class="flex items-start -mx-2">

                            <svg xmlns="http://www.w3.org/2000/svg"class="w-10 h-10 mx-2 text-purple-900 dark:text-purple-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="0.8">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>

                            <span class="mx-2 text-gray-700 truncate w-72 dark:text-gray-400">
                                C.E.O & Founder (Full stack developer)
                            </span>
                        </p>

                        <p class="flex items-start -mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 mx-2 text-purple-500 dark:text-purple-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>

                            <span class="mx-2 text-gray-700 truncate w-72 dark:text-gray-400">+ (255) 769 500 360 | [ whatsapp ]
                                </span>
                        </p>

                        <p class="flex items-start -mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 mx-2 text-purple-500 dark:text-purple-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>

                            <span
                                class="mx-2 text-gray-700 truncate w-72 dark:text-gray-400">erickbale@example.com</span>
                        </p>
                    </div>

                    <div class="mt-6 w-80 md:mt-8">
                        <h3 class="text-gray-600 dark:text-gray-300 ">Follow us</h3>

                        <div class="flex mt-4 -mx-1.5 ">
                            <a class="mx-1.5 pt-2 text-gray-400">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-twitter-x w-5 h-5" viewBox="0 0 16 16">
                                    <path
                                        d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                </svg>
                            </a>

                            <a class="mx-1.5  text-gray-400 transition-colors duration-300 transform ">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.2 8.80005C16.4731 8.80005 17.694 9.30576 18.5941 10.2059C19.4943 11.1061 20 12.327 20 13.6V19.2H16.8V13.6C16.8 13.1757 16.6315 12.7687 16.3314 12.4687C16.0313 12.1686 15.6244 12 15.2 12C14.7757 12 14.3687 12.1686 14.0687 12.4687C13.7686 12.7687 13.6 13.1757 13.6 13.6V19.2H10.4V13.6C10.4 12.327 10.9057 11.1061 11.8059 10.2059C12.7061 9.30576 13.927 8.80005 15.2 8.80005Z"
                                        fill="currentColor" />
                                    <path d="M7.2 9.6001H4V19.2001H7.2V9.6001Z" fill="currentColor" />
                                    <path
                                        d="M5.6 7.2C6.48366 7.2 7.2 6.48366 7.2 5.6C7.2 4.71634 6.48366 4 5.6 4C4.71634 4 4 4.71634 4 5.6C4 6.48366 4.71634 7.2 5.6 7.2Z"
                                        fill="currentColor" />
                                </svg>
                            </a>

                            <a class="mx-1.5  text-gray-400 transition-colors duration-300 transform ">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 10.2222V13.7778H9.66667V20H13.2222V13.7778H15.8889L16.7778 10.2222H13.2222V8.44444C13.2222 8.2087 13.3159 7.9826 13.4826 7.81591C13.6493 7.64921 13.8754 7.55556 14.1111 7.55556H16.7778V4H14.1111C12.9324 4 11.8019 4.46825 10.9684 5.30175C10.1349 6.13524 9.66667 7.2657 9.66667 8.44444V10.2222H7Z"
                                        fill="currentColor" />
                                </svg>
                            </a>

                            <a class="mx-1.5  text-gray-400 transition-colors duration-300 transform ">
                                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.9294 7.72275C9.65868 7.72275 7.82715 9.55428 7.82715 11.825C7.82715 14.0956 9.65868 15.9271 11.9294 15.9271C14.2 15.9271 16.0316 14.0956 16.0316 11.825C16.0316 9.55428 14.2 7.72275 11.9294 7.72275ZM11.9294 14.4919C10.462 14.4919 9.26239 13.2959 9.26239 11.825C9.26239 10.354 10.4584 9.15799 11.9294 9.15799C13.4003 9.15799 14.5963 10.354 14.5963 11.825C14.5963 13.2959 13.3967 14.4919 11.9294 14.4919ZM17.1562 7.55495C17.1562 8.08692 16.7277 8.51178 16.1994 8.51178C15.6674 8.51178 15.2425 8.08335 15.2425 7.55495C15.2425 7.02656 15.671 6.59813 16.1994 6.59813C16.7277 6.59813 17.1562 7.02656 17.1562 7.55495ZM19.8731 8.52606C19.8124 7.24434 19.5197 6.10901 18.5807 5.17361C17.6453 4.23821 16.51 3.94545 15.2282 3.88118C13.9073 3.80621 9.94787 3.80621 8.62689 3.88118C7.34874 3.94188 6.21341 4.23464 5.27444 5.17004C4.33547 6.10544 4.04628 7.24077 3.98201 8.52249C3.90704 9.84347 3.90704 13.8029 3.98201 15.1238C4.04271 16.4056 4.33547 17.5409 5.27444 18.4763C6.21341 19.4117 7.34517 19.7045 8.62689 19.7687C9.94787 19.8437 13.9073 19.8437 15.2282 19.7687C16.51 19.708 17.6453 19.4153 18.5807 18.4763C19.5161 17.5409 19.8089 16.4056 19.8731 15.1238C19.9481 13.8029 19.9481 9.84704 19.8731 8.52606ZM18.1665 16.5412C17.8881 17.241 17.349 17.7801 16.6456 18.0621C15.5924 18.4799 13.0932 18.3835 11.9294 18.3835C10.7655 18.3835 8.26272 18.4763 7.21307 18.0621C6.51331 17.7837 5.9742 17.2446 5.69215 16.5412C5.27444 15.488 5.37083 12.9888 5.37083 11.825C5.37083 10.6611 5.27801 8.15832 5.69215 7.10867C5.97063 6.40891 6.50974 5.8698 7.21307 5.58775C8.26629 5.17004 10.7655 5.26643 11.9294 5.26643C13.0932 5.26643 15.596 5.17361 16.6456 5.58775C17.3454 5.86623 17.8845 6.40534 18.1665 7.10867C18.5843 8.16189 18.4879 10.6611 18.4879 11.825C18.4879 12.9888 18.5843 15.4916 18.1665 16.5412Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END contact Section: get in touch-->

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

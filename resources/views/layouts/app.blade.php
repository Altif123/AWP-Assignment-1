<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome - icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>

</head>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Drop downs -->
<script src="{{ asset('js/alpine.js') }}" defer></script>
<!-- Cookies -->
<script src="{{ asset('js/cookies.js') }}"></script>

<body class=" theme-light z-20 bg-background-first dark:bg-black h-screen antialiased leading-none font-sans">
<div id="app">
    <nav class="bg-background-nav py-6">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div>
                <a href="{{ url('/') }} "aria-label="Go to home page" class="text-lg font-semibold text-gray-100 no-underline">
                    {{ config('app.name') }}
                </a>
            </div>
            <div @click.away="open = false" class="relative " x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm
                            font-semibold text-left text-gray-300 bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 ">
                    <span tabindex="0"
                          role="button"
                          aria-pressed="false">Menu</span>
                    <i fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                       class="fas fa-bars inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"></i>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48 sm:w-60 z-40 ">
                    <div class="px-2 py-2 bg-background-main rounded-md shadow">
                        @guest

                            <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg md:mt-0 hover:text-gray-900
                            focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                               href="{{ route('login') }}" aria-label="Go to login page">Login</a>
                            @if (Route::has('register'))
                                <a class="block px-4 py-2 mt-2 md:text-sm font-semibold rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                   href="{{ route('register') }}" aria-label="Go to menu register page">Register</a>
                            @endif
                            <span class="block px-4 py-2 mt-2 text-xs font-semibold rounded-lg md:mt-0 text-gray-400 hover:text-gray-400
                            focus:text-gray-400 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">Currently not logged in</span>
                        @else
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200"
                               href="/" aria-label="Go to home page">Home</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200"
                               href="{{route('menu.index')}}" aria-label="Go to menu listing page">Menu</a>
                            <a class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                               href="{{route('favorites.index')}}" aria-label="Go to favorites listing page">Favorites</a>
                            <a href="{{ route('logout') }}"
                               class="block px-4 py-2 mt-2 text-sm font-semibold rounded-lg dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                            <span class="block px-4 py-2 mt-2 md:text-sm text-xs font-semibold rounded-lg md:mt-0 text-gray-500  focus:text-gray-400  focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                <p>{{ Auth::user()->name }}</p>
                            </span>
                        @endguest
                        <div class="text-xs" tabindex="0"
                             role="button"
                             aria-pressed="false">
                            <input type="checkbox" id="darkModeToggle" onclick="darkModeOn()"> Toggle dark mode
                        </div>
                    </div>

                </div>

            </div>
            <button class="far fa-question-circle sm:text-xs" tabindex="0"
                    role="button"
                    style="color:white" x-data
                    @click="$dispatch('toggle-modal')">Help
            </button>
        </div>
    </nav>
    <x-helpModal/>

    @yield('content')

</div>

<footer class="footer bg-background-nav relative mt-40 border-t-10 border-blue-700 z-20">
    <div class="container mx-auto px-6">

        <div class="sm:flex sm:mt-8">
            <div class="mt-8 sm:mt-0 sm:w-full sm:px-8 flex flex-col md:flex-row justify-between">
                <div class="flex flex-col mt-8">
                    <span class="my-2"><a href="{{route("menu.index")}}"
                                          class="text-gray-400 text-md hover:text-blue-500">Menu</a></span>
                    <span class="my-2"><a href="{{route("favorites.index")}}"
                                          class="text-gray-400  text-md hover:text-blue-500">Favorites</a></span>
                    <span class="my-2"><a href="/" class="text-gray-400  text-md hover:text-blue-500">Home</a></span>
                </div>
                <div class="flex flex-col mt-8">
                    <span class="my-2"><a href="{{route("login")}}" class="text-gray-400 text-md hover:text-blue-500">Login</a></span>
                    <span class="my-2"><a href="{{ route('register') }}"
                                          class="text-gray-400 text-md hover:text-blue-500">Register</a></span>
                    <span class="my-2"><a href="{{ route('logout') }}"
                                          class="text-gray-400 text-md hover:text-blue-500">Logout</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-6">
        <div class="mt-16 border-t-2 border-gray-300 flex flex-col items-center">
            <div class="sm:w-2/3 text-center py-6">
                <p class="text-sm text-gray-400 font-bold mb-2">
                    © 2020 by Huddersfield Cafe - Altif Ali
                </p>
            </div>
        </div>
    </div>
</footer>

<script>
    darkModeCheck();

    function darkModeCheck() {
        if (docCookies.hasItem("cookieTheme")) {
            document.getElementById('darkModeToggle').checked = true;

        }
    }

    if (docCookies.hasItem('cookieTheme')) {
        var element = document.body;
        element.classList.toggle("theme-dark");

    }

    function darkModeOn() {
        var element = document.body;
        element.classList.toggle("theme-dark");

        var isChecked = document.getElementById('darkModeToggle').checked;

        if (isChecked == true) {
            docCookies.setItem("cookieTheme", "dark mode on")

        } else {
            docCookies.removeItem("cookieTheme")

        }

    }

</script>


</body>
</html>

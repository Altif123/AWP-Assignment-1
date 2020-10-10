@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <div class="relative bg-white overflow-hidden">
                <div class="max-w-screen-xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">


                        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
                            <nav class="relative flex items-center justify-between sm:h-10 lg:justify-start">
                                <div class="flex items-center flex-grow flex-shrink-0 lg:flex-grow-0">
                                    <div class="flex items-center justify-between w-full md:w-auto">
                                        <a href="#" aria-label="Home">
                                            <img class="h-12 w-auto sm:h-14" src="/images/cafe-logo.png" alt="Cafe logo">
                                        </a>
                                        <div class="-mr-2 flex items-center md:hidden">
                                            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" id="main-menu" aria-label="Main menu" aria-haspopup="true">
                                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="hidden md:block md:ml-10 md:pr-4">
                                    <a href="/menu/index" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Menu</a>
                                    <a href="/order" class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Order</a>
                                    <a href="#" class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Favorites</a>
                                </div>
                            </nav>
                        </div>

                        <!--
                        Responive
                          Mobile menu, show/hide based on menu open state.

                          Entering: "duration-150 ease-out"
                            From: "opacity-0 scale-95"
                            To: "opacity-100 scale-100"
                          Leaving: "duration-100 ease-in"
                            From: "opacity-100 scale-100"
                            To: "opacity-0 scale-95"
                        -->
                        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
                            <div class="rounded-lg shadow-md">
                                <div class="rounded-lg bg-white shadow-xs overflow-hidden" role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
                                    <div class="px-5 pt-4 flex items-center justify-between">
                                        <div>
                                            <img class="h-8 w-auto" src="/images/cafe-logo.png" alt="Cafe logo">
                                        </div>
                                        <div class="-mr-2">
                                            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" aria-label="Close menu">
                                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="px-2 pt-2 pb-3">
                                        <a href="/menu/index" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">Menu</a>
                                        <a href="/order" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">Order</a>
                                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 focus:outline-none focus:text-gray-900 focus:bg-gray-50 transition duration-150 ease-in-out" role="menuitem">Favorites</a>
                                    </div>
                                    <div>
                                        <a href="#" class="block w-full px-5 py-3 text-center font-medium text-indigo-600 bg-gray-50 hover:bg-gray-100 hover:text-indigo-700 focus:outline-none focus:bg-gray-100 focus:text-indigo-700 transition duration-150 ease-in-out" role="menuitem">
                                            Log in
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                            <div class="sm:text-center lg:text-left">
                                <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                    The Coffee of your
                                    <br class="xl:hidden">
                                    <span class="text-yellow-600">dreams</span>
                                </h2>
                                <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                    Huddersfield Cafe  is located in the town of Huddersfield, on the wonderful New street. We are a short stroll from the University.
                                    <br><br>
                                    Our restaurant seats 65 persons, evenly split between two dining rooms. Huddersfield Cafe  opened in 1998 with the “bar” dining room which is appointed in rich red and deep tones.
                                    The “green” dining room and wine vault were added two years later. The “green” dining room has a slightly more formal feel than the bar.
                                    Both dining rooms feature new chairs, wormy maple and knotty alder carpentry, luxurious silk and velvet fabrics, and works by local artists.
                                    All area rugs and carpets are of the finest quality wool. Antique accent pieces blend harmoniously with the contemporary vibe

                                </p>
                                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/images/huddersfield-cafe-image.jpg" alt="Huddersfield Cafe Image">
                </div>
            </div>


    </div>
</main>
@endsection

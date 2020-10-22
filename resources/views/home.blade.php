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
                                        <a href="/" aria-label="Home">
                                            <img class="h-12 w-auto sm:h-14" src="/images/cafe-logo.png" alt="Cafe logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="hidden md:block md:ml-10 md:pr-4">
                                    <a href="{{route('menu.index')}}" class="font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Menu</a>
                                    <a href="{{route('favorites.index')}}" class="ml-8 font-medium text-gray-500 hover:text-gray-900 transition duration-150 ease-in-out">Favorites</a>
                                </div>
                            </nav>
                        </div>

                        <main class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                            <div class="sm:text-center lg:text-left">
                                <h2 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                                    The Coffee of your
                                    <br class="xl:hidden">
                                    <span class="text-yellow-600 dark:text-white">dreams</span>
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

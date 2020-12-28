@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">
        <div class="w-full sm:px-6">
            <div class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:mt-10 sm:text-6xl">
                News <span class="text-xs">(from https://sprudge.com/)</span>
            </div>

            <x-backBtn/>
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">

                    <div class="grid grid-cols-3 gap-4 p-6 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3 bg-background-third rounded-md">
                        @foreach ($items as $item)
                            <div class="py-6">
                                <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
                                    <div class="p-4 bg-background-fourth">
                                        <div class="flex flex-col mb-1 pl-2 sm:mb-0">
                                            <h1 class="text-gray-900 font-bold text-base sm:text-1xl md:text-2xl">
                                                <a href="{{ $item->get_permalink() }}">{{ $item->get_title() }}</a>
                                            </h1>
                                            <p class="mt-2 text-gray-600 md:text-sm text-xs">{{ $item->get_description() }}</p>
                                            <div class="flex item-center justify-between mt-3">
                                                <h1 class="text-gray-700 font-bold text-sm  ">Posted
                                                    on {{ $item->get_date('j F Y | g:i a') }}</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach

                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
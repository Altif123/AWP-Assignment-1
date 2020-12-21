@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Basket
            </h1>


            <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-3  bg-background-third rounded-md">
                @foreach($items as $item)
                    @include('_partials.itemCard')
                @endforeach
            </div>
        </div>
    </main>
@endsection

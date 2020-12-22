@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">
        <div class="w-full sm:px-6">
            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:mt-10 sm:text-6xl">
                All orders
            </h1>
            <x-backBtn/>
{{$items}}
            <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-2  bg-background-third rounded-md">
                @if(!$items->isEmpty())
                    @foreach($items as $item)
                        {{$item}}
                        @include('_partials.itemCard')
                    @endforeach
                @else
                    <h3> No favorites here, try adding them from <a href="" class="text-blue-500" >here</a></h3>
                @endif
            </div>
        </div>

    </main>
@endsection
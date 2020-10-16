@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                     role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="mb-6  text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Menu
            </h1>
            <div class="container mx-auto flex items-center w-1/6 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full ">
                <a href="/menu/create">
                    <button><p class="text-center">Add New dish</p></button>
                </a>

            </div>
            <div class="grid p-4 grid-cols-3 gap-3 bg-orange-200">
                @foreach($menu as $item)


                    <div class="  my-3 px-3   bg-gray-200">
                        <a href="/menu/{{ $item -> id }}"><h4
                                    class="text-lg leading-6 font-medium text-gray-900">{{$item->dish_name}}</h4></a>
                        <p class="mt-2 text-base leading-6 text-gray-500">
                            {{$item->description}}
                        </p>
                        <p> £ {{$item->price}} </p>
                    </div>

                @endforeach
            </div>

        </div>

    </main>
@endsection
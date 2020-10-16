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
            <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                {{$menuitem->dish_name}}
            </h1>

            <div class="max-w-sm w-full lg:max-w-full lg:flex">
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
                </div>
                <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class=" flex content-start gap-2">
                            <form method="post" action="/menu/{{$menuitem -> id }}/delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash inline crud-button cursor-pointer"></i>
                                </button>
                            </form>
                            <p>Add to favorites</p>
                            <a href="/menu/{{ $menuitem -> id }}/edit">
                                <i class="fas fa-edit cursor-pointer"></i>
                            </a>
                        </div>
                        <p class="text-sm text-gray-600 flex items-center">
                            <img src="/images/cheese-on-toast.jpeg" class="object-scale-down h-48 w-full"
                                 alt="{{$menuitem->dish_name}} image ">
                        </p>

                        <p class="text-gray-700 text-base">{{$menuitem->description}}</p>
                        <p class="text-orange-700 text-base">{{$menuitem->allergy}}</p>

                    </div>
                    <a href="javascript:history.back()">
                        <button>Back</button>
                    </a>
                </div>
            </div>
        </div>

        </div>
    </main>
@endsection
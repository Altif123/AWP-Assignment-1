@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Menu
            </h1>

            <a href="{{route('menu.create')}}">
                <div class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm  text-gray-700 mr-2 mb-2 ">
                    <button class="fas fa-plus font-light">Add New Dish</button>
                </div>
            </a>
            <div class="flex items-center justify-center">
                <form method="POST" action="{{route('filterByCategory')}}">
                    @csrf
                    <div class="relative text-gray-600 focus-within:text-gray-400">

                        <select id="category" type="category" aria-label="category"
                                class="form-input w-full @error('password') border-red-500 @enderror" name="category"
                                required autocomplete="price">
                            <option value="Sea food">Sea food</option>
                            <option value="Thai">Thai</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Indian">Indian</option>
                            <option value="Turkish">Turkish</option>
                        </select>
                    </div>
                    <button type="submit" role="button"
                            class="select-none align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                        filter
                    </button>
                    </button>
                </form>
            </div>
            <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-3  bg-background-third rounded-md">
                @foreach($menu as $item)
                    @include('_partials.itemCard')
                @endforeach
            </div>
        </div>
    </main>
@endsection

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
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="flex flex-row mb-1 sm:mb-0">

                    <form method="POST" action="{{route('filterByCategory')}}">
                        @csrf
                        <div class="relative text-gray-600 focus-within:text-gray-400">

                            <select id="category" type="category" aria-label="category"
                                    name="category"
                                    required autocomplete="category">
                                <option selected="selected"> Filter by Category <i class="fas fa-chevron-down"></i></option>
                                <option value="Sea food">Sea food</option>
                                <option value="Thai">Thai</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Indian">Indian</option>
                                <option value="Turkish">Turkish</option>
                            </select>
                            <button type="submit" role="button"
                                    class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-800 rounded">
                                Apply filter
                            </button>
                        </div>

                    </form>
                    <div class="flex flex-row mb-1 pl-2 sm:mb-0">
                        <form method="POST" action="{{route('searchByDishName')}}">
                            @csrf
                        <input type="search" name="searchTerm"id="searchTerm"  class="bg-purple-white shadow rounded border-0 " placeholder="Search by dish name...">
                            <button type="submit" role="button"
                                    class="px-4 py-1 text-white font-light tracking-wider bg-blue-500 hover:bg-blue-800 rounded">
                                search
                            </button>

                        </form>
                    </div>
                </div>
            </div>

            <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-3  bg-background-third rounded-md">
                @foreach($menu as $item)
                    @include('_partials.itemCard')
                @endforeach
            </div>
        </div>
    </main>
@endsection

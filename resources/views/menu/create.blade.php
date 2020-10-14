@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="mb-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Add to Menu
            </h1>
                <form action="create/" class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                      method="POST">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="name" class="block text-red-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Dish Name') }}:
                        </label>

                        <input id="dish_name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                               name="dish_name" value="{{ old('dish_name') }}" required autocomplete="dish_name" autofocus
                               placeholder=" E.G PERI chicken">

                        @error('dish_name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Description') }}:
                        </label>

                        <input id="description"
                               class="form-input w-full @error('description') border-red-500 @enderror" name="description"
                               value="{{ old('description') }}" required autocomplete="description"
                               placeholder=" E.G Flame-grilled with crispy skin. Infused with PERi-PERi ">

                        @error('description')
                        <p class="text-green-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="allergy" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Allergy ') }}:
                        </label>

                        <input id="allergy"
                               class="form-input w-full @error('description') border-red-500 @enderror" name="allergy"
                               value="{{ old('allergy') }}" required autocomplete="description"
                               placeholder=" E.G contains nuts ">

                        @error('allergy')
                        <p class="text-green-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Price') }}:
                        </label>

                        <input id="price" type="price"
                               class="form-input w-full @error('password') border-red-500 @enderror" name="amount"
                               required autocomplete="amount" placeholder="E.G 10.00">

                        @error('amount')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            Add new menu item
                        </button>
                        </p>
                    </div>
                </form>
        </div>
    </main>
@endsection
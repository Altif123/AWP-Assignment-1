@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl">
                Basket
            </h1>
            <x-flashMessage/>
        </div>

        <form method="POST" action="order/store/{{$items}}">
            @csrf
            <button type="submit" role="button">
                <i class="fas fa-plus inline crud-button cursor-pointer px-3 py-2"> Confirm</i>
            </button>
        </form>

        <div class="grid p-6 lg:grid-cols-3  md:grid-cols-2 sm:grid-cols-1  gap-3  bg-background-third rounded-md">
            <div class="float-right inline ">
                <span class="bg-green-500 text-grey-600 text-xl font-bold rounded p-2">Basket Total: £{{$cartTotal}}</span>
            </div>
            @foreach($items as $item)
                @include('_partials.itemCard')
            @endforeach
        </div>
    </main>
@endsection

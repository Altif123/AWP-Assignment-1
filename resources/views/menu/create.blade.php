@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">

            @if (session('status'))
                <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <h1 class=" text-gray-600 text-center font-light tracking-wider text-4xl md:text-6xl mt-10">
                Add to Menu
            </h1>

                <form action="{{route('menu.store')}}" class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8"
                      method="POST">
                    @csrf
                    @include('_partials.menuForm')

                </form>
        </div>

    </main>
@endsection
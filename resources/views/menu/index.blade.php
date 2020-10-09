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
                Menu
            </h1>
            {{--@foreach($menu as $item)--}}
            <div class="px-2">
                <div class="flex -mx-2">
                    <div class="w-1/3 px-2">
                        <div class="bg-gray-400 h-12"></div>
                        {{--{{$item}}--}}
                    </div>
                </div>
            </div>
            {{--@endforeach--}}
        </div>
    </main>
@endsection
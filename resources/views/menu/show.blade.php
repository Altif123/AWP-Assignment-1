@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 sm:ml-10">
        <div class="w-full sm:px-6 sm:w-full">
            @include('_partials.showCard',['item' => $menuItem])
        </div>
    </main>
@endsection
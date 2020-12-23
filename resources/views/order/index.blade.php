@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">
        <div class="w-full sm:px-6">
            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:mt-10 sm:text-6xl">
                All orders
            </h1>
            <button id="download" role="button" data-export="export"
                    class="bg-blue-500 float-right hover:bg-blue-700 text-white p-2 font-bold rounded">Download all
                orders<i class="fas fa-cart-arrow-down"></i></button>
            <x-backBtn/>

        </div>
        <div class=" bg-background-third rounded-md p-8">
            <table class="table-auto min-w-full bg-white border-collapse">
                <thead class="bg-yellow-300 text-black">
                <tr>
                    <th class=" text-left py-3 px-4 font-semibold text-sm border border-black">Customer name</th>
                    <th class=" text-left py-3 px-4 font-semibold text-sm border border-black">Customer Email</th>
                    <th class=" text-left py-3 px-4 font-semibold text-sm border border-black">Dish ordered</th>
                    <th class=" text-left py-3 px-4 font-semibold text-sm border border-black">Amount due</th>
                    <th class="text-left py-3 px-4 font-semibold text-sm border border-black">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)
                    <tr>
                        <td class="px-6 py-4 text-left border border-black">{{$item['user']['name']}}</td>
                        <td class="px-6 py-4 text-left border border-black">{{$item['user']['email']}}</td>
                        <td class="px-6 py-4 text-left border border-black">{{$item['menu']['dish_name']}}</td>
                        <td class="px-6 py-4 text-left border border-black">£ {{$item['menu']['price']}}</td>
                        <td class="px-6 py-4 text-left border border-black">
                            <form method="POST" action="{{route('order.delete',$item['menu']['id'])}}">
                                <div class="bg-yellow-400 text-black text-xs  font-bold uppercase rounded">
                                    <x-deleteBtn/>
                                </div>
                            </form>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        </div>
        <script>
            $("#download").click(function () {
                $("table").tableToCSV();
            });</script>
    </main>
@endsection
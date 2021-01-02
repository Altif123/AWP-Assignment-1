@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10 ">
        <div class="w-full sm:px-6">
            <h1 class="mb-6 mt-6 text-gray-600 text-center font-light tracking-wider text-4xl sm:mb-8 sm:mt-10 sm:text-6xl">
                All orders
            </h1>
            <x-backBtn/>
        </div>
        <div class="bg-background-third rounded-md p-8">
            <table class="border-collapse w-full rounded-md order_table" id="order_table">
                <thead class="bg-background-header">
                <tr>
                    <th class="p-3 font-bold text-t-fourth border border-gray-300 hidden lg:table-cell">Customer name
                    </th>
                    <th class="p-3 font-bold text-t-fourth border border-gray-300 hidden lg:table-cell">Customer Email
                    </th>
                    <th class="p-3 font-bold text-t-fourth border border-gray-300 hidden lg:table-cell">Dish ordered
                    </th>
                    <th class="p-3 font-bold text-t-fourth border border-gray-300 hidden lg:table-cell">Amount due</th>
                    <th class="p-3 font-bold text-t-fourth border border-gray-300 hidden lg:table-cell">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-0 text-xs font-bold">Customer name</span>
                            {{$item->user->name}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-0 text-xs font-bold">Customer email</span>
                            {{$item->user->email}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-0 text-xs font-bold">Dish ordered</span>
                            {{$item->menu->dish_name}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-0 text-xs font-bold">Amount due</span>
                            £ {{$item->menu->price}}
                        </td>
                        <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                            <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-0 text-xs font-bold">Action</span>
                            <form method="POST" action="{{route('order.delete',$item->menu->id)}}">
                                <div class="bg-yellow-400 text-black text-xs  font-bold rounded">
                                    <x-deleteBtn/>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
        <script>

            $("#download").click(function () {
                $(".order_table").DataTable();
            });
            $(document).ready(function () {
                $('#order_table').DataTable({
                    "paging": false,
                    "ordering": true,
                    "info": true,
                    dom: 'Bfrtip',
                    buttons: [
                        'csv']
                });
            })
        </script>
    </main>
@endsection
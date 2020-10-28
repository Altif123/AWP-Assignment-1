
<div class="py-6">
    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="w-1/3 bg-cover" style="background-image: url('https://loremflickr.com/320/240/dish,food,steak')">
        </div>
        <div class="w-2/3 p-4">
            <h1 class="text-gray-900 font-bold text-base sm:text-1xl md:text-2xl">{{$item->dish_name}}</h1>
            <p class="mt-2 text-gray-600 md:text-sm text-xs">{{$item->description}}</p>
            <div class="flex item-center mt-2">

            </div>
            <div class="flex item-center justify-between mt-3">
                <h1 class="text-gray-700 font-bold text-sm  ">£ {{$item->price}}</h1>
                <a href="/menu/{{ $item -> id }}"> <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold rounded">View </button></a>
                @if(Route::current()->getName() == 'favorites.index')
                    <form method="POST" action="{{route('favorites.delete',[$item])}}">
                        <div class="bg-gray-800 text-white text-xs  font-bold uppercase rounded">
                        <x-deleteBtn/>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>


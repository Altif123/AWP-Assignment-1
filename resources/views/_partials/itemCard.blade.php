<div class="py-6">
    <div class="flex max-w-md bg-white shadow-lg rounded-lg overflow-hidden">
        @if(isset($item->image) || isset($item['attributes']['image']) )
            <div class="w-1/3 bg-cover" style="background-image: url('/storage/menu_images/{{$item->image??$item['attributes']['image']}}')">
            </div>
        @else
            <div class="w-1/3 bg-cover" style="background-image: url('https://loremflickr.com/320/240/dish,food,steak')">
            </div>
        @endisset
        <div class="w-2/3 p-4 bg-background-fourth">
            <h1 class="text-gray-900 font-bold text-base sm:text-1xl md:text-2xl">{{$item->dish_name??$item->name}}</h1>
            <p class="mt-2 text-gray-600 md:text-sm text-xs">{{$item->description}}</p>
            <div class="flex item-center mt-2">

            </div>
            <div class="flex item-center justify-between mt-3">
                <h1 class="text-gray-700 font-bold text-sm  ">£ {{$item->price}}</h1>
                <a href="/menu/{{ $item -> id }}">
                    <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold rounded" aria-label="View Item in more detail">
                        View
                    </button>
                </a>
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


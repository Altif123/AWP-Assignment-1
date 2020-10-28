<div class="flex items-center justify-center">
    <div class=" max-w-lg rounded overflow-hidden shadow-lg mb-20 ">
        <img class="w-full" src="https://loremflickr.com/320/240/dish,food,steak" alt="{{$menuItem->dish_name}} image">
        <div class="px-6 py-4">
            <div class="font-bold text-3xl mb-2">{{$menuItem->dish_name}}</div>
            <h1 class="text-xl py-1">Description:</h1>
            <p class="text-gray-700 text-base">{{$menuItem->description}}</p>
            <h1 class="text-xl py-1">Price:</h1>
            <p class="text-orange-700 text-sm">£ {{$menuItem->price}}</p>

        </div>
        <div class="px-6 pt-4 pb-2">

        <span class="inline-block bg-red-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            <h1 class="text-sm py-1">Allergy advice:</h1>
            <p class="text-orange-700 text-xs">{{$menuItem->allergy}}</p>
        </span>
        </div>
        <div class="px-6 pt-4 pb-2">
            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <form method="POST" action="{{route('menu.delete',$menuItem)}}">
                    <x-deleteBtn/>
                </form>
            </div>

            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <a href="{{route('menu.edit',$menuItem)}}">
                    <i class="fas fa-edit inline cursor-pointer px-3 py-2">Edit </i>
                </a>
            </div>
            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <form method="POST" action="{{route('favorites.store',[$menuItem])}}">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-star inline crud-button cursor-pointer px-3 py-2"> Add to favorites</i>
                    </button>
                </form>
            </div>
        </div>

        <x-backBtn/>

    </div>
</div>
</div>
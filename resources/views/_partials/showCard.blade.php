

<div class="max-w-sm w-full lg:max-w-full lg:flex">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
    </div>
    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">

        <div class="mb-8">
            <div class=" flex content-start gap-2">
                <form method="POST" action="{{route('menu.delete',$menuItem)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fas fa-trash inline crud-button cursor-pointer"></i>
                    </button>
                </form>


                    <form method="POST" action="{{route('favorites.store',[$menuItem])}}">
                        @csrf
                        <button type="submit">
                            <i class="fas fa-star inline crud-button cursor-pointer"></i>
                        </button>
                    </form>

                <a href="{{route('menu.edit',$menuItem)}}">
                    <i class="fas fa-edit cursor-pointer"></i>
                </a>
            </div>
            <p class="text-sm text-gray-600 flex items-center">
                <img src="/images/cheese-on-toast.jpeg" class="object-scale-down h-48 w-full"
                     alt="{{$menuItem->dish_name}} image ">
            </p>

            <p class="text-gray-700 text-base">{{$menuItem->description}}</p>
            <p class="text-orange-700 text-base">{{$menuItem->allergy}}</p>

        </div>
        <a href="javascript:history.back()">
            <button>Back</button>
        </a>
    </div>
</div>
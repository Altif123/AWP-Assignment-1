<div class="flex items-center justify-center">
    <div class=" max-w-lg rounded overflow-hidden shadow-lg mb-20 ">
        @isset($item->image)
            <img class="w-full" src="/storage/menu_images/{{$item->image}}"
                 alt="{{$menuItem->dish_name}} image">
        @else
            <img class="w-full" src="https://loremflickr.com/320/240/dish,food,steak"
                 alt="{{$menuItem->dish_name}} image">
        @endisset
        <div class="px-6 py-4">
            <div class="font-bold text-3xl mb-2">{{$menuItem->dish_name}}</div>
            <h1 class="text-xl py-1">Description:</h1>
            <p class="text-gray-700 text-base">{{$menuItem->description}}</p>
            <span aria-label="price">
            <h1 class="text-xl py-1">Price:</h1>
            <p class="text-orange-700 text-sm">£ {{$menuItem->price}}</p>
                </span>

        </div>
        <div class="px-6 pt-4 pb-2">

        <span class="inline-block bg-red-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            <h1 class="text-sm py-1" aria-label="Allergy advice">Allergy advice:</h1>
            <p class="text-orange-700 text-xs">{{$menuItem->allergy}}</p>
        </span>

        </div>
        <div class="px-6 pt-4 pb-2">
            @can('delete_menu_item')
                <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <form method="POST" action="{{route('menu.delete',$menuItem)}}">
                        <x-deleteBtn/>
                    </form>
                </div>
            @endcan
            @can('edit_menu_item')
                <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                    <a href="{{route('menu.edit',$menuItem)}}" aria-label="Edit this item">
                        <i class="fas fa-edit inline cursor-pointer px-3 py-2">Edit </i>
                    </a>
                </div>
            @endcan
            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <form method="POST" action="{{route('favorites.store',[$menuItem])}}">
                    @csrf
                    <button type="submit" role="button">
                        <i class="fas fa-star inline crud-button cursor-pointer px-3 py-2"> Add to favorites</i>
                    </button>
                </form>
            </div>
            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <form method="POST" action="{{route('order.add',[$menuItem])}}">
                    @csrf
                    <button type="submit" role="button">
                        <i class="fas fa-plus inline crud-button cursor-pointer px-3 py-2"> Add to order</i>
                    </button>
                </form>
            </div>
            <div class="inline-block bg-gray-200 rounded px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
                <form method="POST" action="{{route('review.store',[$menuItem])}}">
                    @csrf
                    <div class="flex flex-wrap">
                        <label for="review" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Review ') }}:
                        </label>

                        <input id="review" type="text" aria-label="Review"
                               class="form-input w-full @error('review') border-red-500 @enderror" name="review"
                        >

                        @error('review')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror

                        <div class="flex flex-wrap">
                            <label for="rating" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Rating') }}:
                            </label>

                            <select id="rating" aria-label="rating"
                                    class="form-input w-full @error('rating') border-red-500 @enderror" name="rating"
                                    required>
                                <option value="1/5">1/5</option>
                                <option value="2/5">2/5</option>
                                <option value="3/5">3/5</option>
                                <option value="4/5">4/5</option>
                                <option value="5/5">5/5</option>
                            </select>

                            @error('category')
                            <p class="text-red-500 text-xs italic mt-4">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                        <button type="submit" role="button">
                            <i class="fas fa-plus inline crud-button cursor-pointer px-3 py-2"> Submit review</i>
                        </button>
                    </div>
                </form>
                @if($menuItem->reviews->isNotEmpty())
                    <h2>Reviews:</h2>
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="text-left p-2">Review</th>
                            <th class="text-left p-2">Rating</th>
                            <th class="text-left p-2">Author</th>
                            <th class="text-left p-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menuItem -> reviews as $review)
                            <tr>
                                <td class="p-2 text-left">{{$review->review}}</td>
                                <td class="p-2 text-left">{{$review->rating}}</td>
                                <td class="p-2 text-left">{{$review->user->name}}/{{$review->user->id}}</td>
                                @can('delete_review')
                                    <td class="p-2 text-left">
                                        <form method="POST" action="{{}}">
                                            <div class="bg-yellow-400 text-black text-xs  font-bold uppercase rounded">
                                                <x-deleteBtn/>
                                            </div>
                                        </form>

                                    </td>
                                @else
                                    <td class="p-2 text-left">cant delete</td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <h2>No reviews yet</h2>
                @endif

            </div>
        </div>
    </div>


    <x-backBtn/>

</div>
</div>
</div>
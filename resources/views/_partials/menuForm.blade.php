@csrf
<div class="h-screen">
    <div class="flex flex-wrap">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Dish Name') }}:
        </label>

        <input id="dish_name" aria-label="Dish name" type="text"
               class="form-input w-full @error('name')  border-red-500 @enderror"
               name="dish_name" required autocomplete="dish_name" autofocus
               placeholder=" Example PERI chicken" value="{{ $item -> dish_name??''}}">

        @error('dish_name')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex flex-wrap ">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Description') }}:
        </label>


        <textarea id="description" aria-label="Description"
                  class="form-input w-full @error('description') border-red-500 @enderror" name="description"
                  required autocomplete="description"
                  placeholder="Example Flame-grilled with crispy skin. Infused with PERi-PERi">{{old('description')??$item ->description??''}}</textarea>

        @error('description')
        <p class="text-green-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror

    </div>
    <div class="flex flex-wrap">
        <label for="allergy" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Allergy') }}:
        </label>

        <input id="allergy" aria-label="Allergy"
               class="form-input w-full @error('description') border-red-500 @enderror" name="allergy"
               required autocomplete="allergy"
               placeholder=" Example contains nuts " value="{{old('allergy')??$item -> allergy?? ''}}">

        @error('allergy')
        <p class="text-green-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex flex-wrap">
        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Price') }}:
        </label>

        <input id="price" type="price" aria-label="Price"
               class="form-input w-full @error('password') border-red-500 @enderror" name="price"
               required autocomplete="price" placeholder="example 10.00" value="{{old('price')??$item -> price??''}}">

        @error('price')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>
    <div class="flex flex-wrap">
        <label for="category" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Category') }}:
        </label>

        <select id="category" type="category" aria-label="category"
                class="form-input w-full @error('password') border-red-500 @enderror" name="category"
                required autocomplete="price">
            <option value="Sea food">Sea food</option>
            <option value="Thai">Thai</option>
            <option value="Chinese">Chinese</option>
            <option value="Indian">Indian</option>
            <option value="Turkish">Turkish</option>
        </select>

        @error('category')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex flex-wrap">
        <label for="category" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
            {{ __('Image') }}:
        </label>

        <input type="file" id="image" name="image">

        @error('image')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror
    </div>

    <div class="flex flex-wrap mt-8">
        <div class="w-1/6 ">
            <button type="submit" role="button"
                    class="select-none align-center  font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                Add/update menu item
            </button>
        </div>

    </div>
    <x-backBtn/>
</div>


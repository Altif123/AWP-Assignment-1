<div class="  my-3 px-3   bg-gray-200">
    <a href="/menu/{{ $item -> id }}"><h4
                class="text-lg leading-6 font-medium text-gray-900">{{$item->dish_name}}</h4></a>
    <p class="mt-2 text-base leading-6 text-gray-500">
        {{$item->description}}
    </p>
    <p> £ {{$item->price}} </p>
    <div class="left-auto">
        <a href="{{route('menu.show',$item)}}">
            <i class="fas fa-info-circle cursor-pointer ">View</i>
        </a>
    </div>
</div>
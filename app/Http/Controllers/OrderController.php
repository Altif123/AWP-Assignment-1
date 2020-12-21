<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToOrder( $menuItem)
    {
        $item = Menu::find($menuItem);
        // add cart items to a specific user
        //$userId = auth()->user()->id; // or any string represents user identifier
        \Cart::add(array(
            'id' => rand(1,1000),
            'name' => $item->dish_name,
            'price' => $item->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $item->image
            )
        ));

    }

    public function show()
    {
        $items = \Cart::getContent();
        return view('order.showBasket',compact('items'));
    }

    public function remove()
    {
       //
    }

}

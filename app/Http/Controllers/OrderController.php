<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\User;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToOrder( $menuItem)
    {
        $item = Menu::find($menuItem);
        \Cart::add(array(
            'id' => $item->id,
            'name' => $item->dish_name,
            'price' => $item->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $item->image
            )
        ));

        return redirect(route('order.show'))
            ->with('message','Added to order');

    }

    public function show()
    {
        $items = \Cart::getContent();
        return view('order.showBasket',compact('items'));
    }

    public function index()
    {
       $items= Order::with(['menu'])->get()->pluck('menu');

       return view('order.index',compact('items'));
    }

    public function removeFromCart($item)
    {
        \Cart::remove($item);
        return redirect(route('order.show'));
    }


    public function store($items)
    {
        $itemsArray = json_decode($items, true);
        foreach ($itemsArray as $item){
            $order = new Order();
            $order->menu_id = $item['id'];
            $order->user_id = auth()->user()->id;;
            $order->save();
        }
        return redirect()->route('order.show') ->with('message','Order confirmed');
    }

    public function destroy()
    {

    }

}


<?php

namespace App\Http\Controllers;

use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment/index');
    }

    public function processPayment(Request $request)
    {
        $basketTotal = \Cart::getTotal();
        try {
            $charge = Stripe::charges()->create([
                'amount' => $basketTotal,
                'currency' => 'GBP',
                'source' => $request->stripeToken,
                'description' => 'Order',

            ]);

            return redirect(route('order.show'))->with('message', 'Order processed successfully, amount paid is: £'.$basketTotal .'. Please confirm your order for instore collection');
        } catch (CardErrorException $exception) {
            return back()->withErrors('Error ' . $exception->getMessage());
        }
    }
}


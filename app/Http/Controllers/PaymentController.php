<?php

namespace App\Http\Controllers;

use App\Mail\PaymentEmail;
use App\Models\Payment;
use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Exception\MissingParameterException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $this->storePayment();
            $this->emailPayment($basketTotal);

            return redirect(route('order.show'))->with('message', 'Order processed successfully, amount paid is: £' . $basketTotal . '. Please confirm your order for instore collection');
        } catch (CardErrorException $exception) {
            return back()->withErrors('Error ' . $exception->getMessage());
        }catch (MissingParameterException $exception) {
            return back()->withErrors('Error. At least 1 item required in basket to complete order');
        }


    }

    public function storePayment()
    {
        foreach (\Cart::getContent() as $item) {
            Payment::create([
                'order_id' => $item->id,
                'user_id' => auth()->user()->id,
                'amount' => $item->price,
            ]);
        }
    }
    public function emailPayment($basketTotal){
        $emailContents = $basketTotal;
        Mail::to(auth()->user()->email)
            ->send(new PaymentEmail($emailContents));

        return redirect(route('order.show'))
            ->with('message','Confirmation Email sent successfully');

    }

}


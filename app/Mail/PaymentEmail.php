<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailContents;
    public $basketItems;


    public function __construct($emailContents,$basketItems)
    {
        $this->emailContents = $emailContents;
        $this->basketItems = $basketItems;
    }

    public function build()
    {
        return $this->view('emails.paymentEmail');
    }
}

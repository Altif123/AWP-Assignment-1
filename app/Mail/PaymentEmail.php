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


    public function __construct($emailContents)
    {
        $this->emailContents = $emailContents;
    }

    public function build()
    {
        return $this->view('emails.paymentEmail');
    }
}

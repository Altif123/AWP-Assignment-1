<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {

        return view('contact.contactForm');
    }

    public function store(Request $request)
    {
        $emailContents = $request;
        Mail::to('complaints@huddersfield-cafe.com')
            ->send(new ContactUs($emailContents));

        return redirect(route('contact.show'))
            ->with('message', 'Email sent successfully');
    }
}

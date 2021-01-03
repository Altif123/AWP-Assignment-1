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

    public function store()
    {
        $emailContents = request()->validate([
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'email' => ['required', 'email', 'string'],
            'subject' => ['required', 'string', 'min:5', 'max:50'],
            'message' => ['required', 'min:5', 'max:500', 'string'],
        ]);
        Mail::to('complaints@huddersfield-cafe.com')
            ->send(new ContactUs($emailContents));

        return redirect(route('contact.show'))
            ->with('message', 'Email sent successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the incoming request data.
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        // Store the validated data in the database
        Contact::create($data);

        // Send an email
        Mail::to('omneya@example.com')->send(new ContactMail($data));

        //redirect back to form with success msg
        return back()->with('success', 'Thank you for your message!');
    }
}

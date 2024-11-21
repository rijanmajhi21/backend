<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function contactus_store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'destination' => 'nullable',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contactus = ContactUs::create($validatedData);

        // Return a response indicating success or failure
        return response()->json(['message' => 'Contact Us form submitted successfully', 'data' => $contactus]);
    }
}

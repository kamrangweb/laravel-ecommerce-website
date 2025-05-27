<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'message' => 'required|min:10'
        ]);

        // Here you can add your email sending logic
        // For example:
        // Mail::to('your-email@example.com')->send(new ContactFormMail($validated));

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message. We will get back to you soon!'
        ]);
    }
} 
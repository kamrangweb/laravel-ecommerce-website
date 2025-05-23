<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Mesaj;

class MessageController extends Controller
{
    public function contact()
    {
        return view('frontend.mesaj.iletisim');
    }
   
    public function offerForm(Request $request)
    {
        $request->validate([
            'adi' => 'required',
            'email' => 'required|email',
            'telefon' => 'required',
            'konu' => 'required',
            'mesaj' => 'required',
        ],
        [
            'adi.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'email.email' => 'Please enter a valid email address',
            'telefon.required' => 'Phone field is required',
            'konu.required' => 'Subject field is required',
            'mesaj.required' => 'Message field is required',
        ]);

        Mesaj::create($request->all());

        $notification = array(
            'message' => 'We will get back to you soon',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
} 
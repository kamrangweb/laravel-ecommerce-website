<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Mail\OtpMail;
use App\Models\User;
use App\Models\Otp;

class OtpController extends Controller
{
    public function show()
    {
        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $user = Auth::user();
        
        // Here you would typically verify the OTP against what was sent
        // For now, we'll just mark the user as verified
        $user->otp_verified = true;
        $user->save();

        return redirect()->intended('/dashboard');
    }

    public function resend()
    {
        $user = Auth::user();
        
        // Here you would typically generate and send a new OTP
        // For now, we'll just return to the verification page
        return back()->with('status', 'otp-sent');
    }
} 
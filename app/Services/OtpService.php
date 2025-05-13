<?php

namespace App\Services;

use App\Models\Otp;
use App\Mail\OtpMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpService
{
    public function generateOtp($email = null, $phone = null, $expiryMinutes = 10)
    {
        // Generate a 6-digit OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Create OTP record
        return Otp::create([
            'email' => $email,
            'phone' => $phone,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes($expiryMinutes),
            'is_used' => false
        ]);
    }

    public function verifyOtp($otp, $email = null, $phone = null)
    {
        $otpRecord = Otp::where('otp', $otp)
            ->when($email, function($query) use ($email) {
                return $query->where('email', $email);
            })
            ->when($phone, function($query) use ($phone) {
                return $query->where('phone', $phone);
            })
            ->latest()
            ->first();

        if (!$otpRecord || !$otpRecord->isValid()) {
            return false;
        }

        // Mark OTP as used
        $otpRecord->update(['is_used' => true]);
        
        return true;
    }

    public function sendOtp($otp, $email = null, $phone = null)
    {
        if ($email) {
            // Send OTP via email using Mailtrap
            Mail::to($email)->send(new OtpMail($otp));
        }

        if ($phone) {
            // Send OTP via SMS
            // You can integrate with SMS services like Twilio
            // Twilio::sendSms($phone, "Your OTP is: {$otp}");
        }
    }
} 
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\OtpService;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function requestOtp(Request $request)
    {
        $request->validate([
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string'
        ]);

        $otp = $this->otpService->generateOtp(
            $request->email,
            $request->phone
        );

        // Send OTP to user
        $this->otpService->sendOtp(
            $otp->otp,
            $request->email,
            $request->phone
        );

        return response()->json([
            'message' => 'OTP sent successfully'
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
            'email' => 'required_without:phone|email',
            'phone' => 'required_without:email|string'
        ]);

        $isValid = $this->otpService->verifyOtp(
            $request->otp,
            $request->email,
            $request->phone
        );

        if (!$isValid) {
            return response()->json([
                'message' => 'Invalid or expired OTP'
            ], 400);
        }

        return response()->json([
            'message' => 'OTP verified successfully'
        ]);
    }
} 
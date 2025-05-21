<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OtpVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        
        // Allow access to OTP verification routes
        if ($request->is('verify-otp') || $request->is('resend-otp')) {
            return $next($request);
        }

        // Check OTP verification for other routes
        if (!$user->otp_verified) {
            return redirect()->route('otp.verify');
        }

        return $next($request);
    }
} 
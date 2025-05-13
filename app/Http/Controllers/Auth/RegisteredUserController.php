<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Create user but don't log them in yet
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => null, // Ensure email is not verified yet
        ]);

        // Generate and send OTP
        $otp = $this->otpService->generateOtp($user->email);
        $this->otpService->sendOtp($otp->otp, $user->email);

        // Store user ID in session for verification
        session(['pending_user_id' => $user->id]);

        // Redirect to OTP verification page
        return redirect()->route('verification.otp');
    }

    public function showOtpForm(): View
    {
        if (!session('pending_user_id')) {
            return redirect()->route('register');
        }
        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request): RedirectResponse
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $pendingUserId = session('pending_user_id');
        if (!$pendingUserId) {
            return redirect()->route('register')->with('error', 'Registration session expired. Please register again.');
        }

        $user = User::find($pendingUserId);
        if (!$user) {
            return redirect()->route('register')->with('error', 'User not found. Please register again.');
        }

        $isValid = $this->otpService->verifyOtp($request->otp, $user->email);

        if (!$isValid) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // Mark email as verified
        $user->email_verified_at = now();
        $user->save();

        // Clear the pending user session
        session()->forget('pending_user_id');

        // Log the user in
        Auth::login($user);

        event(new Registered($user));

        return redirect(route('dashboard', absolute: false));
    }

    public function resendOtp(): RedirectResponse
    {
        $pendingUserId = session('pending_user_id');
        if (!$pendingUserId) {
            return redirect()->route('register')->with('error', 'Registration session expired. Please register again.');
        }

        $user = User::find($pendingUserId);
        if (!$user) {
            return redirect()->route('register')->with('error', 'User not found. Please register again.');
        }

        // Generate and send new OTP
        $otp = $this->otpService->generateOtp($user->email);
        $this->otpService->sendOtp($otp->otp, $user->email);

        return back()->with('status', 'A new OTP has been sent to your email.');
    }
}

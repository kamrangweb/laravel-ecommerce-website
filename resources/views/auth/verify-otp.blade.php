@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div>
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-center">
            <h2 class="text-2xl font-bold text-gray-700">{{ __('Email Verification') }}</h2>
            <p class="mt-2 text-sm text-gray-600">{{ __('Please enter the 6-digit verification code sent to your email address.') }}</p>
        </div>

        @if (session('status') == 'otp-sent')
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ __('A new verification code has been sent to your email address.') }}</span>
            </div>
        @endif

        <!-- Verification Form -->
        <form method="POST" action="{{ route('verification.otp.verify') }}" class="mb-4" id="otpForm">
            @csrf
            <input type="hidden" name="otp" id="otpInput">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2 text-center">{{ __('Verification Code') }}</label>
                <div class="flex justify-center">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="">
                            <input type="text" 
                                   class="w-8 h-8 sm:w-10 sm:h-10 text-center text-base sm:text-lg font-semibold rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('otp') border-red-500 @enderror px-2" 
                                   name="otp_digit_{{ $i }}" 
                                   maxlength="1"
                                   pattern="[0-9]"
                                   inputmode="numeric"
                                   required
                                   autofocus="{{ $i === 1 }}"
                                   data-index="{{ $i }}">
                        </div>
                    @endfor
                </div>
                @error('otp')
                    <p class="mt-2 text-sm text-red-600 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center">
                <button type="submit" class="btn btn-primary w-full sm:w-auto px-4 py-2 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Verify Email') }}
                </button>
            </div>
        </form>

        <!-- Separate Resend Form -->
        <div class="text-center">
            <p class="text-sm text-gray-600 mb-2">{{ __("Didn't receive the code?") }}</p>
            <form method="POST" action="{{ route('verification.otp.resend') }}" class="inline">
                @csrf
                <button type="submit" class="text-sm text-indigo-600 hover:text-indigo-900 font-medium">
                    {{ __('Resend Code') }}
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Custom styles for OTP inputs */
    input[name^="otp_digit"] {
        transition: all 0.2s ease;
    }
    
    input[name^="otp_digit"]:focus {
        transform: scale(1.05);
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
    }
    
    input[name^="otp_digit"]:not(:placeholder-shown) {
        border-color: #4f46e5;
        background-color: #f8fafc;
    }
    
    @media (max-width: 640px) {
        input[name^="otp_digit"] {
            width: 2rem !important;
            height: 2rem !important;
            font-size: 1rem !important;
        }
    }

    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }

    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input[name^="otp_digit"]');
    const form = document.getElementById('otpForm');
    const otpInput = document.getElementById('otpInput');

    // Function to update hidden input
    function updateOtpValue() {
        const otpValue = Array.from(inputs)
            .map(input => input.value)
            .join('');
        otpInput.value = otpValue;
    }

    // Handle input
    inputs.forEach((input, index) => {
        // Only allow numbers
        input.addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9]/g, '');
            updateOtpValue();
            
            // Move to next input if value is entered
            if (this.value.length === 1 && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        // Handle backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !this.value && index > 0) {
                inputs[index - 1].focus();
            }
        });

        // Handle paste
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pastedData = e.clipboardData.getData('text').slice(0, 6);
            if (/^\d+$/.test(pastedData)) {
                pastedData.split('').forEach((digit, i) => {
                    if (inputs[i]) {
                        inputs[i].value = digit;
                    }
                });
                updateOtpValue();
                if (inputs[pastedData.length]) {
                    inputs[pastedData.length].focus();
                }
            }
        });
    });

    // Update OTP value before form submission
    form.addEventListener('submit', function(e) {
        updateOtpValue();
    });
});
</script>
@endsection 
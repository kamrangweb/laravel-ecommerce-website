@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-transparent border-0 text-center pt-4">
                    <h3 class="mb-0">OTP Verification</h3>
                    <p class="text-muted mt-2">Enter the 6-digit code sent to your email</p>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('verify.otp') }}" class="otp-form">
                        @csrf
                        <div class="otp-inputs mb-4">
                            <div class="row g-2 justify-content-center">
                                @for($i = 1; $i <= 6; $i++)
                                <div class="col-2">
                                    <input type="text" 
                                           class="form-control form-control-lg text-center otp-input" 
                                           maxlength="1" 
                                           pattern="[0-9]" 
                                           inputmode="numeric"
                                           name="otp[]"
                                           autocomplete="off"
                                           required>
                                </div>
                                @endfor
                            </div>
                        </div>

                        @if(session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Verify OTP
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="mb-0">Didn't receive the code?</p>
                        <form method="POST" action="{{ route('resend.otp') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link p-0">
                                Resend OTP
                            </button>
                        </form>
                        <span class="text-muted ms-2" id="timer">(60s)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .otp-input {
        font-size: 1.5rem;
        font-weight: 600;
        height: 60px;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .otp-input:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .otp-input.filled {
        border-color: #4e73df;
        background-color: #f8f9fc;
    }

    .btn-primary {
        background-color: #4e73df;
        border: none;
        padding: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2e59d9;
        transform: translateY(-1px);
    }

    .btn-link {
        color: #4e73df;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-link:hover {
        color: #2e59d9;
        text-decoration: underline;
    }

    .card {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.9);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('.otp-input');
    const form = document.querySelector('.otp-form');
    let timer = 60;
    const timerElement = document.getElementById('timer');

    // Handle input
    inputs.forEach((input, index) => {
        input.addEventListener('input', function(e) {
            if (e.target.value.length === 1) {
                e.target.classList.add('filled');
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            } else {
                e.target.classList.remove('filled');
            }
        });

        // Handle backspace
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !e.target.value && index > 0) {
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
                        inputs[i].classList.add('filled');
                    }
                });
                if (inputs[pastedData.length]) {
                    inputs[pastedData.length].focus();
                }
            }
        });
    });

    // Timer functionality
    function startTimer() {
        const resendButton = document.querySelector('button[type="submit"]');
        resendButton.disabled = true;
        
        const interval = setInterval(() => {
            timer--;
            timerElement.textContent = `(${timer}s)`;
            
            if (timer <= 0) {
                clearInterval(interval);
                resendButton.disabled = false;
                timerElement.textContent = '';
            }
        }, 1000);
    }

    startTimer();
});
</script>
@endsection 
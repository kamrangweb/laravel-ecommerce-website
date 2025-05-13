<!DOCTYPE html>
<html>
<head>
    <title>Verify OTP</title>
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .otp-input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 24px;
            margin: 0 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .otp-input:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .otp-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="index.html" class="auth-logo">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Verify Your Email</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('verification.verify') }}" id="otpForm">
                            @csrf
                            <input type="hidden" name="otp" id="otpInput">

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="otp-container">
                                        <input type="text" maxlength="1" class="otp-input" data-index="1" autofocus>
                                        <input type="text" maxlength="1" class="otp-input" data-index="2">
                                        <input type="text" maxlength="1" class="otp-input" data-index="3">
                                        <input type="text" maxlength="1" class="otp-input" data-index="4">
                                        <input type="text" maxlength="1" class="otp-input" data-index="5">
                                        <input type="text" maxlength="1" class="otp-input" data-index="6">
                                    </div>
                                    <x-input-error :messages="$errors->get('otp')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group mb-3 text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Verify Email</button>
                                </div>
                            </div>

                            <div class="form-group mb-0 row mt-2">
                                <div class="col-12 mt-3 text-center">
                                    <p class="mb-0">Didn't receive the code? 
                                        <form method="POST" action="{{ route('verification.resend') }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Resend OTP</button>
                                        </form>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.otp-input');
            const form = document.getElementById('otpForm');
            const hiddenInput = document.getElementById('otpInput');

            // Handle input
            inputs.forEach((input, index) => {
                // Handle input
                input.addEventListener('input', function(e) {
                    if (this.value.length === 1) {
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
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
                                if (i < inputs.length - 1) {
                                    inputs[i + 1].focus();
                                }
                            }
                        });
                    }
                });
            });

            // Handle form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const otp = Array.from(inputs).map(input => input.value).join('');
                hiddenInput.value = otp;
                form.submit();
            });
        });
    </script>
</body>
</html> 
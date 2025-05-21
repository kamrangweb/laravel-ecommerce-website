@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('OTP Verification') }}</div>

                <div class="card-body">
                    @if (session('status') == 'otp-sent')
                        <div class="alert alert-success" role="alert">
                            {{ __('A new OTP has been sent to your phone number.') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="otp" class="form-label">{{ __('Enter OTP') }}</label>
                            <input type="text" class="form-control @error('otp') is-invalid @enderror" 
                                   id="otp" name="otp" required autofocus>
                            @error('otp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Verify OTP') }}
                            </button>

                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link">
                                    {{ __('Resend OTP') }}
                                </button>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
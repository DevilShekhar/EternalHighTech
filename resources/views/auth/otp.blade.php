@extends('layouts.app')

{{-- Add body class for styling --}}
@section('body-class', 'elite-login-body otp-page')

@section('content')

<div class="elite-bg-shape shape-one"></div>
  <div class="elite-bg-shape shape-two"></div>
  <div class="elite-login-section"></div>

<div class="elite-login-card">

    <h2>OTP Verification</h2>
    <p>Enter OTP sent to your email</p>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf

        <input type="text"
               name="otp_code"
               class="elite-input form-control"
               placeholder="Enter OTP"
               required>

        <button class="btn elite-login-btn w-100 mt-4">
            Verify OTP
        </button>
    </form>

</div>

@endsection
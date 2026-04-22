@extends('layouts.app')

@section('body-class', 'elite-login-body')

@section('content')

<div class="elite-login-page">

    <div class="elite-bg-shape shape-one"></div>
    <div class="elite-bg-shape shape-two"></div>

    <section class="elite-login-section">
        <div class="" style="max-width:500px; margin-top: 70px">

            <div class="elite-form-box">

                <div class="elite-form-head text-center">
                    <h2>Forgot Password</h2>
                    <p>We will send a link to reset your password</p>
                </div>

                {{-- SUCCESS MESSAGE --}}
                @if (session('status'))
                    <div class="alert alert-success text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/forgot-password') }}">
                  @csrf

                    {{-- EMAIL --}}
                    <div class="elite-field">
                        <label>Email</label>

                        <div class="elite-input-wrap">
                            <i class="fa-regular fa-envelope elite-input-icon"></i>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus
                                   placeholder="Enter your email"
                                   class="elite-input form-control @error('email') is-invalid @enderror">
                        </div>

                        @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn elite-login-btn w-100 mt-3">
                        Forgot Password
                    </button>

                </form>

            </div>

        </div>
    </section>

</div>

@endsection
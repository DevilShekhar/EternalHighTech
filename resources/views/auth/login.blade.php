@extends('layouts.app')

{{-- IMPORTANT: add body class for background --}}
@section('body-class', 'elite-login-body')

@section('content')

<div class="elite-login-page">

  {{-- Background Effects --}}
  <div class="elite-bg-shape shape-one"></div>
  <div class="elite-bg-shape shape-two"></div>
  <div class="elite-bg-grid"></div>

  <section class="elite-login-section">
    <div class="elite-login-card">

      {{-- TOP BAR --}}
      <div class="elite-login-top">
        <div class="elite-logo-wrap">
          <div class="elite-logo-box">
            <img src="{{ asset('assets/img/logo.png') }}" alt="EHT Logo" />
          </div>
          <div class="elite-brand-text">
            <h5>EHT Secure Panel</h5>
            <span>Vehicle Insurance Admin Access</span>
          </div>
        </div>

        <div class="elite-top-badge">
          <i class="fa-solid fa-shield-halved"></i>
          <span>Protected Access</span>
        </div>
      </div>

      <div class="elite-login-content">

        {{-- LEFT SIDE --}}
        <div class="elite-login-left">
          <span class="elite-mini-tag">PREMIUM ADMIN LOGIN</span>
          <h1>Welcome Back</h1>
          <p>
            Sign in to access your premium dashboard, manage vehicle insurance workflows,
            users, and policy operations with a secure and modern experience.
          </p>

          <div class="elite-feature-strip">
            <div class="elite-feature-item">
              <i class="fa-solid fa-lock"></i>
              <span>Secure Authentication</span>
            </div>
            <div class="elite-feature-item">
              <i class="fa-solid fa-chart-pie"></i>
              <span>Smart Dashboard Access</span>
            </div>
            <div class="elite-feature-item">
              <i class="fa-solid fa-database"></i>
              <span>Insurance Data Control</span>
            </div>
          </div>
        </div>

        {{-- RIGHT SIDE FORM --}}
        <div class="elite-login-right">
          <div class="elite-form-box">

            <div class="elite-form-head">
              <h2>Login</h2>
              <p>Please enter your credentials to continue</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
              @csrf

              {{-- EMAIL --}}
              <div class="elite-field">
                <label for="email">Email Address</label>

                <div class="elite-input-wrap">
                  <i class="fa-regular fa-envelope elite-input-icon"></i>

                  <input id="email"
                         type="email"
                         class="elite-input form-control @error('email') is-invalid @enderror"
                         name="email"
                         value="{{ old('email') }}"
                         required
                         autofocus
                         placeholder="Enter your email">
                </div>

                @error('email')
                  <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              {{-- PASSWORD --}}
              <div class="elite-field">
                <div class="elite-label-row">
                  <label for="password">Password</label>

                  @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="elite-forgot-link">
                      Forgot Password?
                    </a>
                  @endif
                </div>

                <div class="elite-input-wrap elite-password-wrap">
                  <i class="fa-solid fa-lock elite-input-icon"></i>

                  <input id="password"
                         type="password"
                         class="elite-input form-control @error('password') is-invalid @enderror"
                         name="password"
                         required
                         placeholder="Enter your password">

                  <button type="button" class="elite-password-toggle" id="togglePassword">
                    <i class="fa-regular fa-eye"></i>
                  </button>
                </div>

                @error('password')
                  <span class="invalid-feedback d-block">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              {{-- REMEMBER --}}
              <div class="elite-form-bottom">
                <div class="elite-checkbox">
                  <input type="checkbox"
                         name="remember"
                         id="remember-me"
                         {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember-me">Remember Me</label>
                </div>
              </div>

              {{-- LOGIN BUTTON --}}
              <div class="form-group mb-0">
                <button type="submit" class="btn elite-login-btn w-100">
                  <span>Login</span>
                  <i class="fa-solid fa-arrow-right"></i>
                </button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</div>

{{-- PASSWORD TOGGLE SCRIPT --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
});
</script>

@endsection
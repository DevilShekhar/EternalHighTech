@extends('layouts.app')

{{-- Add body class for styling --}}
@section('body-class', 'elite-login-body')

@section('content')

<div class="elite-login-page">

  <!-- Background -->
  <div class="elite-bg-shape shape-one"></div>
  <div class="elite-bg-shape shape-two"></div>
  <div class="elite-bg-grid"></div>

  <section class="elite-login-section">
    <div class="elite-login-card">

      <!-- TOP -->
      <div class="elite-login-top">
        <div class="elite-logo-wrap">
          <div class="elite-logo-box">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
          </div>
          <div class="elite-brand-text">
            <h5>Password Recovery</h5>
            <span>Secure Reset Access</span>
          </div>
        </div>

        <div class="elite-top-badge">
          <i class="fa-solid fa-shield-halved"></i>
          <span>Protected</span>
        </div>
      </div>

      <div class="elite-login-content">

        <!-- LEFT -->
        <div class="elite-login-left">
          <span class="elite-mini-tag">RESET ACCESS</span>
          <h1>Set New Password</h1>
          <p>Enter your new password to regain access.</p>
        </div>

        <!-- RIGHT FORM -->
        <div class="elite-login-right">
          <div class="elite-form-box">

            <div class="elite-form-head">
              <h2>Update Password</h2>
              <p>Create a new secure password</p>
            </div>

            <form method="POST" action="{{ route('password.update.custom') }}">
                    @csrf


                    <!-- EMAIL -->
                    <!-- NEW PASSWORD -->
                    <div class="elite-field">
                        <label>New Password</label>

                        
                        <div class="elite-password-wrap">
                        
                          <input type="password"
                              id="password"
                              name="password"
                              class="elite-input form-control @error('password') is-invalid @enderror"
                              placeholder="Enter new password"
                              required>

                              <span class="elite-eye-icon" onclick="togglePassword('password', 'eyeIcon1')">
                                  <i id="eyeIcon1" class="fa fa-eye-slash"></i>
                              </span>

                          
                      </div>

                        @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- CONFIRM PASSWORD -->
                    <div class="elite-field">
                          <label>Confirm Password</label>

                          <div class="elite-password-wrap">
                              <input type="password"
                                  id="password_confirmation"
                                  name="password_confirmation"
                                  class="elite-input form-control"
                                  placeholder="Confirm password"
                                  required>

                              <span class="elite-eye-icon" onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                                  <i id="eyeIcon2" class="fa fa-eye-slash"></i>
                              </span>
                          </div>
                    </div>
                    <!-- BUTTON -->
                    <button type="submit" class="btn elite-login-btn w-100">
                        Update Password
                    </button>

                </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</div>



@section('scripts')
<script>
function togglePassword(inputId, iconId) {
    let input = document.getElementById(inputId);
    let icon = document.getElementById(iconId);

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    }
}
</script>
@endsection
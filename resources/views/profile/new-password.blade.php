@extends('admin.layouts.app')

@section('content')

<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Security</span>
            <h2>Set New Password</h2>
            <p>Create a strong and secure password for your account.</p>
        </div>
    </div>
</section>

<section class="section premium-dashboard pt-0">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif

<form method="POST" action="{{ route('password.update') }}">
@csrf

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card premium-block form-section-card">

            <div class="card-header premium-card-header">
                <div>
                    <h4>New Password</h4>
                    <p class="header-subtext">Enter and confirm your new password</p>
                </div>
            </div>

            <div class="card-body">

                <!-- NEW PASSWORD -->
                <div class="mb-4 position-relative">
                    <label class="form-group-label">New Password</label>

                    <input type="password" id="new_password" name="new_password"
                        class="form-control premium-input"
                        placeholder="Enter new password" required>

                    <span class="toggle-password" onclick="togglePassword('new_password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-4 position-relative">
                    <label class="form-group-label">Confirm Password</label>

                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                        class="form-control premium-input"
                        placeholder="Confirm password" required>

                    <span class="toggle-password" onclick="togglePassword('new_password_confirmation')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <!-- BUTTON -->
                <div class="action-bar mt-3">
                    <button type="submit" class="btn action-btn btn-main-premium w-100">
                        Update Password
                    </button>
                </div>

            </div>

        </div>

    </div>

</div>

</form>

</section>
<!-- sweet alert -->
 

<script>
function togglePassword(fieldId) {
    const input = document.getElementById(fieldId);
    const icon = event.currentTarget.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
@endsection
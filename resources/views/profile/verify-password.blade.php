@extends('admin.layouts.app')

@section('content')

{{-- ✅ SWEET ALERT SUCCESS --}}
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        confirmButtonText: 'OK'
    }).then(() => {
        window.location.href = "{{ route('dashboard') }}";
    });
</script>
@endif

<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Security</span>
            <h2>Change Password</h2>
            <p>Update your account password securely.</p>
        </div>
    </div>
</section>

<section class="section premium-dashboard pt-0">

@if($errors->any())
    <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif

<!-- <form method="POST" action="{{ route('password.update') }}"> -->
    <form method="POST" action="{{ route('password.verify.post') }}">
@csrf

<div class="row justify-content-center">

    <div class="col-lg-6">

        <div class="card premium-block form-section-card">

            <div class="card-header premium-card-header">
                <div>
                    <h4>Password Security</h4>
                    <p class="header-subtext">Enter your credentials</p>
                </div>
            </div>

            <div class="card-body">

                <div class="mb-4 position-relative">
                    <label class="form-group-label">Old Password</label>

                    <input type="password" id="old_password" name="old_password"
                        class="form-control premium-input"
                        placeholder="Enter old password" required>

                    <span class="toggle-password" onclick="togglePassword('old_password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <div class="action-bar mt-3">
                    <button type="submit" class="btn action-btn btn-main-premium w-100">
                        Submit
                    </button>
                </div>

            </div>

        </div>

    </div>

</div>

</form>

</section>

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
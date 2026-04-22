@extends('admin.layouts.app')

@section('content')

<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Profile</span>
            <h2>Edit Profile</h2>
            <p>Update your personal information and account details.</p>
        </div>
    </div>
</section>

<section class="section premium-dashboard pt-0">

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
@csrf

<div class="row">

    <!-- LEFT SIDE -->
    <div class="col-lg-8 col-md-12">

        <div class="card premium-block form-section-card">

            <div class="card-header premium-card-header">
                <div>
                    <h4>Profile Information</h4>
                    <p class="header-subtext">Basic personal details</p>
                </div>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label class="form-group-label">Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control premium-input">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-group-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control premium-input">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-group-label">Mobile</label>
                        <input type="text" name="mobile_number" value="{{ $user->mobile_number }}" class="form-control premium-input">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-group-label">Gender</label>

                        <select name="gender" class="form-control premium-input">
                            <option value="">Select gender</option>

                            <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                            <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>
                                Other
                            </option>
                        </select>

                    </div>

                    <div class="col-md-6 mb-4">
                        <input type="date" name="date_of_birth"
                        value="{{ $user->date_of_birth ? \Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') : '' }}"
                        class="form-control premium-input">
                     </div>

                    <!-- ADDRESS FULL WIDTH -->
                    <div class="col-12 mb-4">
                        <label class="form-group-label">Address</label>
                        <textarea name="address" class="form-control premium-input premium-textarea" placeholder="Enter full address">{{ $user->address }}</textarea>                    </div>

                </div>

            </div>
        </div>

        <div class="action-bar mt-4">
            <button type="submit" class="btn action-btn btn-main-premium">Update Profile</button>
        </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="col-lg-4 col-md-12">

        <div class="card premium-block form-section-card">

            <div class="card-header premium-card-header">
                <div>
                    <h4>Profile Image</h4>
                    <p class="header-subtext">Update your profile photo</p>
                </div>
            </div>

            <div class="card-body text-center">

                <div class="profile-avatar-preview">
                    <img src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('assets/img/user.png') }}">
                </div>

                <input type="file" name="profile_photo" class="form-control premium-input mt-3">

            </div>

        </div>

    </div>

</div>

</form>

</section>

@endsection
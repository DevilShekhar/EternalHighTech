@extends('admin.layouts.app')

@section('content')

<div class="premium-head-actions mb-3 text-end">

    <a href="{{ route('profile.edit') }}" class="btn premium-btn btn-main-premium">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-edit">

            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14
            a2 2 0 0 0 2-2v-7"></path>

            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12
            15l-4 1 1-4 9.5-9.5z"></path>

        </svg>

        Update Profile
    </a>

</div>

<div class="profile-card">

    <!-- Floating Profile Image -->
    <div class="profile-img-wrapper">
        @if($user->profile_photo)
            <img src="{{ asset('storage/' . $user->profile_photo) }}" class="profile-img">
        @else
            <img src="https://via.placeholder.com/150" class="profile-img">
        @endif
    </div>

    <h1>User Profile</h1>

    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Mobile:</strong> {{ $user->mobile_number }}</p>
    <p><strong>Gender:</strong> {{ $user->gender }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p><strong>DOB:</strong> {{ $user->date_of_birth }}</p>
    <p><strong>Address:</strong> {{ $user->address }}</p>

</div>

@endsection
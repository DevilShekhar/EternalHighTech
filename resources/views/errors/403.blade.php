@extends('admin.layouts.app')

@section('content')
<div class="section">
    <div class="section-body d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="text-center">
            <h1 class="display-3 text-danger">403</h1>
            <h4>Unauthorized Access</h4>
            <p class="text-muted">You don’t have permission to access this page.</p>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary mt-3">
                Go to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
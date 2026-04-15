@extends('admin.layouts.app')
@section('content')
    <section class="section premium-dashboard">
        <div class="premium-page-head">
            <div class="premium-page-title">
                <span class="mini-badge">Testimonial Management</span>
                <h2>Add New Testimonial</h2>
                <p>Create a new testimonial for website display.</p>
            </div>
            <div class="premium-head-actions">
                <a href="{{ route('testimonial.index') }}" class="btn premium-btn ghost-btn">
                    <i data-feather="arrow-left"></i> Back to Testimonials
                </a>
            </div>
        </div>
    </section>
    <section class="section premium-dashboard pt-0">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="card premium-block form-section-card">
                        <div class="card-header premium-card-header">
                            <div>
                                <h4>Testimonial Information</h4>
                                <p class="header-subtext">Add testimonial details</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-group-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"  class="form-control premium-input" placeholder="Enter name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-group-label">Role</label>
                                    <input type="text" name="role" value="{{ old('role') }}"  class="form-control premium-input" placeholder="Enter role/designation">
                                        @error('role')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-group-label">Description</label>
                                    <textarea name="description"  class="form-control premium-input premium-textarea" rows="5"  placeholder="Enter testimonial description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="action-bar mt-4">
                            <button type="reset" class="btn action-btn btn-light-premium">Reset</button>
                            <button type="submit" class="btn action-btn btn-main-premium">Save Testimonial</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card premium-block form-section-card">
                            <div class="card-header premium-card-header">
                                <div>
                                    <h4>Image Upload</h4>
                                    <p class="header-subtext">Upload testimonial profile image</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="profile-upload-box">
                                    <div class="profile-avatar-preview">
                                        <img src="{{ asset('assets/img/user.png') }}" alt="Preview">
                                    </div>
                                    <h5>Upload Image</h5>
                                    <p>PNG, JPG supported</p>
                                    <input type="file" name="image" class="form-control premium-input">
                                    @error('image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
@endsection
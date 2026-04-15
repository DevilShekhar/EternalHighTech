@extends('admin.layouts.app')
@section('content')
<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Testimonial Management</span>
            <h2>Edit Testimonial</h2>
            <p>Update testimonial details.</p>
        </div>
        <div class="premium-head-actions">
            <a href="{{ route('testimonial.index') }}" class="btn premium-btn ghost-btn">
                <i data-feather="arrow-left"></i> Back to Testimonials
            </a>
        </div>
    </div>
</section>
<section class="section premium-dashboard pt-0">
    <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card premium-block form-section-card">
                    <div class="card-header premium-card-header">
                        <div>
                            <h4>Testimonial Information</h4>
                            <p class="header-subtext">Update testimonial details</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-group-label">Name</label>
                                <input type="text"
                                       name="name"
                                       value="{{ old('name', $testimonial->name) }}"
                                       class="form-control premium-input">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-group-label">Role</label>
                                <input type="text"
                                       name="role"
                                       value="{{ old('role', $testimonial->role) }}"
                                       class="form-control premium-input">
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-group-label">Description</label>
                                <textarea name="description"
                                          rows="5"
                                          class="form-control premium-input premium-textarea">{{ old('description', $testimonial->description) }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                            <label class="form-group-label">Status</label>
                            <select name="status" class="form-control premium-input">
                                <option value="1" {{ old('status', $testimonial->status) == 1 ? 'selected' : '' }}>
                                    Active
                                </option>
                                <option value="0" {{ old('status', $testimonial->status) == 0 ? 'selected' : '' }}>
                                    Deactive
                                </option>
                            </select>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="action-bar mt-4">
                    <a href="{{ route('testimonial.index') }}" class="btn action-btn btn-light-premium">Cancel</a>
                    <button type="submit" class="btn action-btn btn-main-premium"> Update Testimonial </button>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card premium-block form-section-card">
                    <div class="card-header premium-card-header">
                        <div>
                            <h4>Image Upload</h4>
                            <p class="header-subtext">Update testimonial image</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-upload-box">
                            <div class="profile-avatar-preview mb-3">
                                @if($testimonial->image)
                                    <img src="{{ asset('storage/' . $testimonial->image) }}"
                                         alt="Testimonial Image"
                                         style="width:120px; height:120px; object-fit:cover; border-radius:10px;">
                                @else
                                    <img src="{{ asset('assets/img/user.png') }}"
                                         alt="Default Preview"
                                         style="width:120px; height:120px;">
                                @endif
                            </div>
                            <h5>Upload New Image</h5>
                            <p>PNG, JPG supported</p>
                            <input type="file"  name="image" class="form-control premium-input">
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
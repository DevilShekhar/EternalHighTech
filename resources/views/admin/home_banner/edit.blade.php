@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Home Banner</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
               <form action="{{ route('home-banner.update', $homeBanner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ old('heading', $homeBanner->heading) }}">
                        @error('heading')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control" rows="4">{{ old('short_description', $homeBanner->short_description) }}</textarea>
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Current Image</label><br>
                        @if($homeBanner->image)
                            <img src="{{ asset('uploads/home_banners/' . $homeBanner->image) }}" width="120" style="border-radius:8px;">
                        @else
                            <p>No image found</p>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label>Change Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $homeBanner->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $homeBanner->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('home-banner.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
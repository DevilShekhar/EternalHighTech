@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Home Banner</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('home-banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label>Heading</label>
                        <input type="text" name="heading" class="form-control" value="{{ old('heading') }}">
                        @error('heading')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control" rows="4">{{ old('short_description') }}</textarea>
                        @error('short_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('home-banner.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
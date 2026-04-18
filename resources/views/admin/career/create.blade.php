@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Add Career</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Add Career Form</h4>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                       

                        <div class="col-md-6 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Experience</label>
                            <input type="text" name="experience" class="form-control" value="{{ old('experience') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Industry</label>
                            <input type="text" name="industry" class="form-control" value="{{ old('industry') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Job Type</label>
                            <input type="text" name="job_type" class="form-control" value="{{ old('job_type') }}">
                        </div>

                           

                       <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="summernote form-control" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Image Upload</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Career</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
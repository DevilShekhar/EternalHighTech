@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Category</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('service-category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}">
                        @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
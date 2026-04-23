@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

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

                    <div class="form-group mb-3">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name) }}" required>
                        @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('service-category.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@else
    @php abort(403); @endphp
@endif
@endsection
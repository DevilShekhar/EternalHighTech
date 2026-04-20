@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

<section class="section">
    <div class="section-header">
        <h1>Add Category</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Add New Category</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('service-category.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" class="form-control" value="{{ old('category_name') }}">
                        @error('category_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
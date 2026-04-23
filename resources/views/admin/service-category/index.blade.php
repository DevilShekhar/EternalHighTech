@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

<section class="section">
    <div class="section-header">
        <h1>Service Category List</h1>
    </div>

    <div class="section-body">
        

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Categories</h4>
                <a href="{{ route('service-category.create') }}" class="btn btn-primary">Add Category</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($serviceCategories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $category->category_name ?? '-' }}</td>
                                    <td>{{ $category->slug ?? '-' }}</td>
                                    <td>{{ optional($category->creator)->name ?? '-' }}</td>
                                    <td>{{ optional($category->updater)->name ?? '' }}</td>
                                    <td>
                                        @if($category->status == 1)
                                            <span class="btn btn-success btn-sm">Active</span>
                                        @else
                                            <span class="btn btn-danger btn-sm">Deactive</span>
                                        @endif
                                    </td>
                                  <td>
                                        <a href="{{ route('service-category.edit', $category->id) }}" class="btn btn-warning btn-sm me-2">
                                            Edit
                                        </a>

                                        <form action="{{ route('service-category.destroy', $category->id) }}" method="POST" class="delete-form" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No category records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@else
    @php abort(403); @endphp
@endif

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This category will be deactivated!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, deactivate it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endsection
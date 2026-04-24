@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header d-flex justify-content-between align-items-center">
        <h1>All Home Banner</h1>
        <a href="{{ route('home-banner.create') }}" class="btn btn-primary">Add Home Banner</a>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Short Description</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($homeBanners as $key => $banner)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($banner->image)
                                            <img src="{{ asset('uploads/home_banners/' . $banner->image) }}" width="80" height="60" style="object-fit:cover; border-radius:6px;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $banner->heading }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($banner->short_description, 60) }}</td>
                                    <td>{{ $banner->creator->name ?? 'N/A' }}</td>
                                    <td>{{ $banner->updater->name ?? 'N/A' }}</td>
                                    <td>
                                        @if($banner->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="{{ route('home-banner.edit', $banner->id) }}" class="btn btn-sm btn-info">
                                                Edit
                                            </a>

                                            @if($banner->status == 1)
                                                <form action="{{ route('home-banner.destroy', $banner->id) }}" method="POST" class="delete-form d-inline m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        Delete
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-sm btn-secondary" disabled>
                                                    Delete
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

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
                    text: "This banner will be marked as inactive!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, inactive it!',
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
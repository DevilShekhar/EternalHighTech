@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<section class="section">
    <div class="section-header">
        <h1>Career List</h1>
    </div>

    <div class="section-body">
        

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Careers</h4>
                <a href="{{ route('career.create') }}" class="btn btn-primary">Add Career</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Experience</th>
                                <th>Industry</th>
                                <th>Job Type</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($careers as $key => $career)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($career->image)
                                                    <img src="{{ asset('storage/' . $career->image) }}" width="60" style="border-radius:8px;">
                                                @else
                                                    No Image
                                                @endif
                                    </td>
                                    <td>{{ $career->title ?? '-' }}</td>
                                    <td>{{ $career->location ?? '-' }}</td>
                                    <td>{{ $career->experience ?? '-' }}</td>
                                    <td>{{ $career->industry ?? '-' }}</td>
                                    <td>{{ $career->job_type ?? '-' }}</td>
                                    <td>{{ $career->creator->name ?? '-' }}</td>
                                    <td>{{ $career->updater->name ?? '-' }}</td>
                                    <td>
                                               @if((int)$career->status === 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Deactive</span>
                                                @endif
                                                                                        </td>
                                    <td>
                                        <a href="{{ route('career.edit', $career->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('career.destroy', $career->id) }}" method="POST"class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No career records found.</td>
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
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
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
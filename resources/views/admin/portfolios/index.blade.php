@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<section class="section">
    <div class="section-header">
        <h1>Portfolio List</h1>
    </div>

    <div class="section-body">
       

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Portfolio Case Studies</h4>
                <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Add New Portfolio</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Sub Heading</th>
                                <th>Link One</th>
                                <th>Performance Title</th>
                                <th>Client Heading</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($portfolios as $key => $portfolio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($portfolio->image)
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" width="70" style="border-radius:8px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $portfolio->heading ?? '-' }}</td>
                                    <td>{{ $portfolio->sub_heading ?? '-' }}</td>
                                    <td>
                                        @if($portfolio->link_one)
                                            <a href="{{ $portfolio->link_one }}" target="_blank">View Link</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $portfolio->meta_ads_title ?? '-' }}</td>
                                    <td>{{ $portfolio->feedback_heading ?? '-' }}</td>
                                        <td>
                                            @if($portfolio->status == 1)
                                                <span class="btn btn-success btn-sm">Active</span>
                                            @else
                                                <span class="btn btn-danger btn-sm">Deactive</span>
                                            @endif
                                        </td>
                                   
                                        <td>
                                            <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                                            <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No portfolio records found.</td>
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
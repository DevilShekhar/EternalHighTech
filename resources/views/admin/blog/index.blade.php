@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<section class="section">
    <div class="section-header">
        <h1>Blog List</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">All Blogs</h4>
                <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add New Blog</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Title</th>
                                <th>Company Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($blogs as $key => $blog)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $blog->title ?? '-' }}</td>
                                    <td>{{ $blog->company_name ?? '-' }}</td>
                                    <td>{{ optional($blog->creator)->name ?? '-' }}</td>
                                    <td>{{ optional($blog->updater)->name ?? '-' }}</td>
                                    <td>
                                        @if($blog->status == 'Active' || $blog->status == 1)
                                            <span class="badge badge-success px-3 py-2">Active</span>
                                        @else
                                            <span class="badge badge-danger px-3 py-2">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-btns">
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>

                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="delete-form d-inline m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No blog records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .action-btns {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: nowrap;
    }

    .action-btns form {
        margin: 0;
    }

    #tableExport_filter {
        float: right;
        text-align: right;
    }

    #tableExport_wrapper .row:last-of-type {
        display: flex !important;
        flex-direction: column;
        align-items: flex-end;
    }

    #tableExport_wrapper .row:last-of-type > div {
        flex: 0 0 auto;
        max-width: 100%;
    }

    #tableExport_info {
        text-align: right !important;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #tableExport_paginate {
        text-align: right !important;
        display: flex;
        justify-content: flex-end;
    }
</style>

<script>
    $(document).ready(function () {
        $('#tableExport').on('draw.dt init.dt', function () {
            $('#tableExport_filter').css({
                'float': 'right',
                'text-align': 'right'
            });

            $('#tableExport_wrapper .row:last-of-type').css({
                'display': 'flex',
                'flex-direction': 'column',
                'align-items': 'flex-end'
            });
        });
    });
</script>
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
                    text: "This blog will be deactivated!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, do it!',
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
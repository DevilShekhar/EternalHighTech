@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<section class="section">
    <div class="section-header">
        <h1>Services List</h1>
    </div>

    <div class="section-body">
      

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Services</h4>
                <a href="{{ route('services.create') }}" class="btn btn-primary">Add Services</a>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-end mb-3" id="customSearchBox"></div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Category</th>
                                <th>Heading</th>
                                <th>Sub Heading</th>
                                <th>Slug</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $key => $service)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $service->category->category_name ?? '-' }}</td>
                                    <td>{{ $service->heading ?? '-' }}</td>
                                    <td>{{ $service->sub_heading ?? '-' }}</td>
                                    <td>{{ $service->slug ?? '-' }}</td>
                                    <td>{{ optional($service->creator)->name ?? '-' }}</td>
                                    <td>{{ optional($service->updater)->name ?? '' }}</td>
                                    <td>
                                        @if($service->status == 'Active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No service records found.</td>
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
    $(document).ready(function() {
        $('#tableExport').on('draw.dt init.dt', function () {
            $('#tableExport_filter').css({'float': 'right', 'text-align': 'right'});
            $('#tableExport_wrapper .row:last-of-type').css({'display': 'flex', 'flex-direction': 'column', 'align-items': 'flex-end'});
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
                    text: "This service will be deactivated!",
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
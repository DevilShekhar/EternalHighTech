@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Services List</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Services</h4>
                <a href="{{ route('services.create') }}" class="btn btn-primary">Add Services</a>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-end mb-3" id="customSearchBox">
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Category</th>
                                <th>Heading</th>
                                <th>Sub Heading</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Updated By</th>
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
                                    <td>
                                        @if($service->status == 'Active')
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $service->creator->name ?? '-' }}</td>
                                    <td>{{ $service->updater->name ?? '-' }}</td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
    </div>
</section>
<style>
    /* 1. Move the "Search:" label and input box to the right side */
    #tableExport_filter {
        float: right;
        text-align: right;
    }

    /* Override Bootstrap row behavior for the bottom DataTable controls */
    #tableExport_wrapper .row:last-of-type {
        display: flex !important;
        flex-direction: column;
        align-items: flex-end;
    }

    /* Reset column widths so they don't force left alignment */
    #tableExport_wrapper .row:last-of-type > div {
        flex: 0 0 auto;
        max-width: 100%;
    }

    /* 2 & 4. Move "Showing..." text to the right, keeping it above pagination */
    #tableExport_info {
        text-align: right !important;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    /* 3. Move pagination buttons to the right side */
    #tableExport_paginate {
        text-align: right !important;
        display: flex;
        justify-content: flex-end;
    }
</style>

<script>
    // DataTable JS event listener to ensure alignment styles persist during pagination/filtering redraws
    $(document).ready(function() {
        $('#tableExport').on('draw.dt init.dt', function () {
            $('#tableExport_filter').css({'float': 'right', 'text-align': 'right'});
            $('#tableExport_wrapper .row:last-of-type').css({'display': 'flex', 'flex-direction': 'column', 'align-items': 'flex-end'});
        });
    });
</script>
@endsection
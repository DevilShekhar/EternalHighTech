@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')
<section class="section">
    <div class="section-body">
        <div class="card premium-card">
            <div class="card-header d-flex justify-content-between align-items-center flex-wrap" style="gap:12px;">
                <div>
                    <h4>Blog List</h4>
                    <p>Manage all blog entries here</p>
                </div>

                <a href="{{ route('blogs.create') }}" class="btn btn-primary px-4">
                    Add Blog
                </a>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="table-responsive premium-table-wrap">
                    <table class="table table-striped table-hover align-middle premium-table" id="tableExport">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Heading</th>
                                <th>Title</th>
                                <th>Company Name</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $blog->heading }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->company_name }}</td>
                                <td>
                                    @if($blog->status == 'Active')
                                        <span class="premium-status active">Active</span>
                                    @else
                                        <span class="premium-status inactive">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $blog->creator->name ?? '-' }}</td>
                                <td>{{ $blog->updater->name ?? '-' }}</td>
                               <td>
                                    <div class="d-flex align-items-center gap-2 flex-nowrap">
                                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="m-0">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this blog?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
@else
    @php abort(403); @endphp
@endif
@endsection
@extends('admin.layouts.app')
@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

    <section class="section premium-dashboard">
        <div class="premium-page-head">
            <div class="premium-page-title">
                <span class="mini-badge">Testimonial Management</span>
                <h2>All Testimonials</h2>
                <p>Manage all Testimonial records with premium table layout.</p>
            </div>
            <div class="premium-head-actions">
                <a href="{{ route('testimonial.create') }}" class="btn premium-btn btn-main-premium">
                    <i data-feather="plus"></i> Add New Testimonial
                </a>
            </div>
        </div>
    </section>
    <section class="section premium-dashboard pt-0">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card premium-block">
                        <div class="card-header premium-card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-1">Testimonial List</h4>
                                <p class="header-subtext mb-0">All registered Testimonials are displayed below</p>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Description</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th width="150">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($testimonials as $key => $testimonial)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    @if($testimonial->image)
                                                        <img src="{{ asset('storage/' . $testimonial->image) }}"
                                                            alt="testimonial-image"
                                                            width="50"
                                                            height="50"
                                                            class="rounded">
                                                    @else
                                                        <img src="{{ asset('assets/img/user.png') }}"
                                                            alt="Default User"
                                                            width="45"
                                                            height="45"
                                                            style="object-fit: cover; border-radius: 50%;">
                                                    @endif
                                                </td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->role }}</td>
                                                <td>
                                                    {{ \Illuminate\Support\Str::limit($testimonial->description, 50) }}
                                                </td>
                                                <td>{{ $testimonial->created_by ?? 'N/A' }}</td>
                                                <td>{{ $testimonial->updated_by ?? 'N/A' }}</td>
                                                <td>{{ $testimonial->created_at->format('d M Y') }}</td>
                                                <td>
                                                    @if($testimonial->status == 1)
                                                        <span class="btn btn-success btn-sm">Active</span>
                                                    @else
                                                        <span class="btn btn-danger btn-sm">Deactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('testimonial.edit', $testimonial->id) }}"
                                                    class="btn btn-sm btn-info">
                                                        Edit
                                                    </a>

                                                    <form action="{{ route('testimonial.destroy', $testimonial->id) }}"
                                                        method="POST"
                                                        style="display:inline-block;"
                                                        onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
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
                                                <td colspan="9" class="text-center">No Testimonials Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@else
    @php abort(403); @endphp
@endif
@endsection
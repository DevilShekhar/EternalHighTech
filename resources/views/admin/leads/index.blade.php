@extends('admin.layouts.app')

@section('content')
<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Lead Management</span>
            <h2>All Leads</h2>
            <p>Manage all leads with premium table layout.</p>
        </div>
    </div>
</section>

<section class="section premium-dashboard pt-0">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card premium-block">
                    <div class="card-header premium-card-header">
                        <div>
                            <h4 class="mb-1">Lead List</h4>
                            <p class="header-subtext mb-0">All submitted leads are displayed below</p>
                        </div>
                    </div>

                    <div class="card-body">

                       

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact</th>
                                        <th>Service</th>
                                        <th>Budget</th>
                                        <th>Goal</th>
                                        <th>Location</th>
                                        <th>Assigned To</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($leads as $lead)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>
                                                <strong>{{ $lead->name }}</strong><br>
                                                <small>{{ $lead->business_name ?? '-' }}</small>
                                            </td>

                                            <td>
                                                <strong>Email:</strong> {{ $lead->email }}<br>
                                                <strong>Phone:</strong> {{ $lead->phone }}
                                            </td>

                                            <td>{{ $lead->services }}</td>
                                            <td>{{ $lead->budget }}</td>
                                            <td>{{ $lead->goal }}</td>

                                            <td>
                                                {{ $lead->city ?? '-' }},
                                                {{ $lead->state ?? '-' }}<br>
                                                <small>{{ $lead->country ?? '' }}</small>
                                            </td>

                                            <td>
                                                {{ $lead->user->name ?? 'Unassigned' }}
                                            </td>

                                            <td>
                                                {{ $lead->created_at->format('d M Y') }}
                                            </td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('leads.show', $lead->id) }}" class="btn btn-sm btn-info">View</a>

                                                    <form action="{{ route('leads.destroy', $lead->id) }}"  method="POST" class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center">No leads found.</td>
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
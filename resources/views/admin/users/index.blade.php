@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

    <section class="section premium-dashboard">
        <div class="premium-page-head">
            <div class="premium-page-title">
                <span class="mini-badge">User Management</span>
                <h2>All Users</h2>
                <p>Manage all user records with premium table layout.</p>
            </div>
            <div class="premium-head-actions">
                <a href="{{ route('users.create') }}" class="btn premium-btn btn-main-premium">
                    <i data-feather="plus"></i> Add New User
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
                                <h4 class="mb-1">User List</h4>
                                <p class="header-subtext mb-0">All registered users are displayed below</p>
                            </div>
                        </div>
                        <div class="card-body">
                           
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Profile</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Gender</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if($user->profile_photo)
                                                        <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                                            alt="{{ $user->name }}"
                                                            width="45"
                                                            height="45"
                                                            style="object-fit: cover; border-radius: 50%;">
                                                    @else
                                                        <img src="{{ asset('assets/img/user.png') }}"
                                                            alt="Default User"
                                                            width="45"
                                                            height="45"
                                                            style="object-fit: cover; border-radius: 50%;">
                                                    @endif
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>
                                                    <strong>Email:</strong> {{ $user->email }}<br>
                                                    <strong>Mobile:</strong> {{ $user->mobile_number ?? '-' }}
                                                </td>                                          
                                                <td>{{ $user->gender ?? '-' }}</td>
                                                <td>{{ $user->role ?? '-' }}</td>       
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No users found.</td>
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
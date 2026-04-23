@extends('admin.layouts.app')

@section('content')
<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Lead Management</span>
            <h2>All Leads</h2>
            <p>Manage all leads with premium table layout.</p>
        </div>

        <div class="buttons d-flex flex-wrap gap-2 mt-3">

            <a href="{{ route('leads.index') }}"
               class="btn btn-secondary {{ request()->routeIs('leads.index') ? 'active' : '' }}">
                Assigned
            </a>

            <a href="{{ route('contacted.list') }}"
               class="btn btn-warning {{ request()->routeIs('contacted.list') ? 'active' : '' }}">
                Contacted
            </a>

            <a href="{{ route('interested.list') }}"
               class="btn btn-success {{ request()->routeIs('interested.list') ? 'active' : '' }}">
                Interested
            </a>

            <a href="{{ route('not_interested.list') }}"
               class="btn btn-dark {{ request()->routeIs('not_interested.list') ? 'active' : '' }}">
                Not Interested
            </a>

            <a href="{{ route('invalid.list') }}"
               class="btn btn-outline-secondary {{ request()->routeIs('invalid.list') ? 'active' : '' }}">
                Invalid
            </a>

            <a href="{{ route('junk.list') }}"
               class="btn btn-danger {{ request()->routeIs('junk.list') ? 'active' : '' }}">
                Junk
            </a>

            <a href="{{ route('onboard.list') }}"
               class="btn btn-primary {{ request()->routeIs('onboard.list') ? 'active' : '' }}">
                Onboard
            </a>

            <a href="{{ route('reminders.list') }}"
               class="btn btn-info {{ request()->routeIs('reminders.list') ? 'active' : '' }}">
                Reminder
            </a>

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

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

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

                                                    <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Delete this lead?')">
                                                            Delete
                                                        </button>
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
@endsection
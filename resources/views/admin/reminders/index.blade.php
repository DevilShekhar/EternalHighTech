@extends('admin.layouts.app')

@section('content')
<section class="section premium-dashboard">
    <div class="premium-page-head">
        <div class="premium-page-title">
            <span class="mini-badge">Lead Management</span>
            <h2>All Leads</h2>
            <p>Manage all leads with premium table layout.</p>
        </div>
        <!-- Filter Buttons -->
        <div class="buttons d-flex flex-wrap gap-2 mt-3">

            <a href="{{ route('leads.index') }}" class="btn btn-secondary">
                 All Leads
            </a>
          
            <a href="{{ route('leads.inprogress') }}" class="btn btn-warning">
                In Progress
            </a>
            <a href="{{ route('reminders.list') }}" class="btn btn-info">
                 Reminder
            </a>
            <a href="{{ route('completed.list') }}" class="btn btn-success">
                 Completed
            </a>

            <a href="#" class="btn btn-danger">
                Junk
            </a>
        </div>
    </div>
    
</section>
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Reminder Leads</h4>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">

                        <tr>
                            <th>#</th>
                            <th>Lead Name</th>
                            @if(Auth::user()->role === 'admin')
                                <th>Sales Person</th>
                            @endif
                            <th>Action</th>
                            <th>Status</th>
                            <th>Next Follow-up</th>
                            <th>Priority</th>
                        </tr>

                        @forelse($reminders as $key => $reminder)

                        @php
                            $date = \Carbon\Carbon::parse($reminder->next_followup_date);
                            $isOverdue = $date->isPast();
                            $isToday = $date->isToday();
                        @endphp

                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $reminder->lead->name ?? 'N/A' }}</td>

                            @if(Auth::user()->role === 'admin')
                                <td>{{ $reminder->user->name ?? 'N/A' }}</td>
                            @endif

                            <td>{{ ucfirst($reminder->action_type ?? '-') }}</td>

                            <td>
                                <span class="badge badge-info">
                                    {{ ucfirst($reminder->status) }}
                                </span>
                            </td>

                            <td>{{ $date->format('d M Y') }}</td>

                            <td>
                                @if($isOverdue)
                                    <span class="badge badge-danger">Overdue</span>
                                @elseif($isToday)
                                    <span class="badge badge-warning">Today</span>
                                @else
                                    <span class="badge badge-success">Upcoming</span>
                                @endif
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No reminders found</td>
                        </tr>
                        @endforelse

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
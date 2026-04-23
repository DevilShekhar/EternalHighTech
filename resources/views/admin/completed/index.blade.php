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
                <h4>Completed Leads</h4>
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
                            <th>Closed Date</th>
                            <th>Priority</th>
                            <th>Action</th>
                        </tr>

                        @forelse($closedLeads as $key => $lead)

                        @php
                            $date = \Carbon\Carbon::parse($lead->next_followup_date);
                            $isOverdue = $date->isPast();
                            $isToday = $date->isToday();
                        @endphp

                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $lead->lead->name ?? 'N/A' }}</td>

                            @if(Auth::user()->role === 'admin')
                                <td>{{ $lead->user->name ?? 'N/A' }}</td>
                            @endif

                            <td>{{ ucfirst($lead->action_type ?? '-') }}</td>

                            <td>
                                <span class="badge badge-success">
                                    Closed
                                </span>
                            </td>

                            <td>{{ $date->format('d M Y') }}</td>

                            <td>
                                @if($isOverdue)
                                    <span class="badge badge-danger">Was Overdue</span>
                                @elseif($isToday)
                                    <span class="badge badge-warning">Closed Today</span>
                                @else
                                    <span class="badge badge-success">On Time</span>
                                @endif
                            </td>
                            <td>
                               <div class="btn-group">
                                    <a href="{{ route('completed.show', $lead->lead_id) }}" class="btn btn-sm btn-info">
                                        View
                                    </a>
                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="{{ Auth::user()->role === 'admin' ? 7 : 6 }}" class="text-center">
                                No completed leads found
                            </td>
                        </tr>
                        @endforelse

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
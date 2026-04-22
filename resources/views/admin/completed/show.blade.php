@extends('admin.layouts.app')

@section('content')

@php use Carbon\Carbon; @endphp

<div class="row">
    <div class="col-12">
        {{-- Lead Info --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Lead Details</h4>
                <span class="badge badge-success">
                    {{ ucfirst($lead->status) }}
                </span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <strong>Name:</strong>
                        <p>{{ $lead->name }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Email:</strong>
                        <p>{{ $lead->email ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Phone:</strong>
                        <p>{{ $lead->phone ?? 'N/A' }}</p>
                    </div>
                   @if(Auth::user()->role === 'admin' || Auth::user()->role === 'sales_head')
                        {{--  Show Sales Person ONLY ONCE --}}
                        <div class="col-md-3">
                            <strong>Sales Person:</strong>
                            <p>{{ $lead->user->name ?? 'N/A' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::user()->role === 'admin' && !empty($leadLogs))
            <div class="card mt-4">
                <div class="row">
                    <div class="card-body p-0">
                        <div class="table-responsive">                       
                                <h4>Lead Logs</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>                                       
                                            <th>Action</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($leadLogs as $log)
                                            <tr>
                                                <td>{{ $log->id }}</td>                                          
                                                <td>{{ $log->action }}</td>
                                                <td>{{ $log->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>                      
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- Follow-up History --}}
        <div class="card mt-4">
            <div class="card-header">
                <h4>Lead Activity History</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Action</th>
                            <th>Status</th>
                            <th>Follow-up Date & Time</th>
                            <th>Priority</th>
                            <th>Remarks</th>
                        </tr>
                        @forelse($lead->followups as $key => $followup)

                        @php
                            $date = Carbon::parse($followup->next_followup_date);
                            $isOverdue = $date->isPast() && $followup->status !== 'closed';
                            $isToday = $date->isToday();
                        @endphp

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ ucfirst($followup->action_type ?? '-') }}</td>
                            <td>
                                <span class="badge 
                                    {{ $followup->status == 'closed' ? 'badge-success' : 'badge-info' }}">
                                    {{ ucfirst($followup->status) }}
                                </span>
                            </td>
                            <td>
                                {{ $date->format('d M Y, h:i A') }}
                            </td>
                            <td>
                                @if($isOverdue)
                                    <span class="badge badge-danger">Overdue</span>
                                @elseif($isToday)
                                  
                                @else
                                    <span class="badge badge-success">Upcoming</span>
                                @endif
                            </td>
                            <td>{{ $followup->note ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                No follow-ups found
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
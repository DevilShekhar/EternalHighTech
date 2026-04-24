@extends('admin.layouts.app')

@section('content')

<div class="container">

    <!-- 🔹 Lead Header -->
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
                    <div class="col-md-3">
                        <strong>Services:</strong>
                        <p>{{ $lead->services }}</p>
                    </div>

                    <div class="col-md-3">
                        <strong>Budget:</strong>
                        <p>{{ $lead->budget ?? 'N/A' }}</p>
                    </div>

                    <div class="col-md-3">
                        <strong>Message:</strong>
                        <p>{{ $lead->message ?? 'N/A' }}</p>
                    </div>
                    
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
    @if($lead->status !== 'onboard')
        <!-- 🔹 Action Button -->
        <div class="mb-3 text-end">
    
            <button class="btn btn-primary"  data-toggle="modal"  data-target="#exampleModal"> + Add Follow-up </button>
        </div>
    @endif
<style>
    .timeline {
    position: relative;
    padding-left: 20px;
}


.timeline-marker {
    position: relative;
}

.timeline-marker span {
    display: block;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    margin-top: 8px;
}
</style>
    <!-- 🔹 Follow-up Timeline -->
    <div class="card p-3">
        <h5 class="mb-3">Follow-up Timeline</h5>

        <div class="timeline">

            @forelse($lead->followups as $f)
                <div class="timeline-item d-flex mb-4">                  
                    <!-- Content -->
                    <div class="card shadow-sm w-100 border-0">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0 fw-bold">{{ $f->user->name }}</h6>
                                <small class="text-muted">
                                    {{ $f->created_at->diffForHumans() }}
                                </small>
                            </div>

                            <!-- Status Badges -->
                            <div class="mb-2">
                                <span class="badge bg-info text-dark">
                                    {{ ucfirst($f->action_type) }}
                                </span>
                                <span class="badge bg-success">
                                    {{ ucfirst($f->status) }}
                                </span>
                            </div>

                            <!-- Optional Info -->
                            @if($f->business_name)
                                <p class="mb-1">
                                    <strong>Business:</strong> {{ $f->business_name }}
                                </p>
                            @endif

                            @if($f->alt_mobile)
                                <p class="mb-1">
                                    <strong>Alt Mobile:</strong> {{ $f->alt_mobile }}
                                </p>
                            @endif

                            @if($f->short_desc)
                                <p class="text-muted mb-2">
                                    {{ $f->short_desc }}
                                </p>
                            @endif

                            <!-- Note -->
                            <p class="mb-2">{{ $f->note }}</p>

                            <!-- Footer -->
                            <div class="d-flex justify-content-between border-top pt-2 mt-2">
                                <small class="text-muted">
                                    <b>Next:</b>
                                    {{ $f->next_followup_date 
                                        ? $f->next_followup_date->format('d M Y, h:i A') 
                                        : 'Not scheduled' }}
                                </small>

                                <small class="text-muted">
                                    <b>Created:</b>
                                    {{ $f->created_at->format('d M Y, h:i A') }}
                                </small>
                            </div>

                        </div>
                    </div>

                </div>
            @empty
                <p class="text-muted">No follow-ups yet.</p>
            @endforelse

            </div>

    </div>

</div>
<!-- 🔹 Follow-up Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Add Follow-up</h5>

                <!--  FIXED CLOSE BUTTON -->
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <!-- Body -->
            <div class="modal-body">

                <form action="{{ route('leads.followup.store', $lead->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Action Type -->
                        <div class="col-md-12 mb-3">
                            <label>Action Type</label>
                            <select name="action_type" class="form-control" required>
                                <option value="">Select Action</option>
                                <option value="call">📞 Call</option>
                                <option value="call_ringing_no_answer">🔔 Ringing (No Answer)</option>
                                <option value="meeting">📅 Meeting</option>
                                <option value="email">📧 Email</option>
                                <option value="whatsapp">💬 WhatsApp</option>
                            </select>
                        </div>
                        <!-- Business Name -->
                        <div class="col-md-12 mb-3">
                            <label>Business Name</label>
                           <input type="text" name="business_name" class="form-control"   value="{{ $firstFollowup->business_name ?? '' }}"  {{ $firstFollowup ? 'readonly' : '' }}>
                        </div>

                        <!-- Alternate Mobile / WhatsApp -->
                        <div class="col-md-12 mb-3">
                            <label>Alternate Mobile / WhatsApp No</label>
                            <input type="text" name="alt_mobile" class="form-control"   value="{{ $firstFollowup->alt_mobile ?? '' }}"  {{ $firstFollowup ? 'readonly' : '' }}>
                        </div>

                        <!-- Short Description -->
                        <div class="col-md-12 mb-3">
                            <label>Short Description</label>
                            <textarea name="short_desc" class="form-control" rows="2" placeholder="Short description..."></textarea>
                        </div>
                        <!-- Status -->
                        <div class="col-md-12 mb-3">
                            <label>Lead Status</label>
                           <select name="status" class="form-control" required>
                                <option >Select Option</option>
                                <option value="contacted">Contacted</option>
                                <option value="interested">Interested</option>
                                <option value="not_interested">Not Interested</option>
                                <option value="onboard">Onboard</option>
                                <option value="invalid">Invalid</option>
                                <option value="junk">Junk</option>
                            </select>
                        </div>
                        <!-- Next Follow-up -->
                        <div class="col-md-12 mb-3">
                            <label>Next Follow-up Date & Time</label>
                         <input type="datetime-local"  name="next_followup_date"  class="form-control" value="{{ old('next_followup_date') }}">
                        </div>

                        <!-- Notes -->
                        <div class="col-md-12 mb-3">
                            <label>Notes</label>
                            <textarea name="note" rows="4" class="form-control" placeholder="Write follow-up details..." required></textarea>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            Save Follow-up
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
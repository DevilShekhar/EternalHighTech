@extends('admin.layouts.app')

@section('content')

<div class="container">

    <!-- 🔹 Lead Header -->
    <div class="card shadow-sm mb-4 p-3">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-1">{{ $lead->name }}</h4>
                <small class="text-muted">
                    {{ $lead->email }} | {{ $lead->phone }}
                </small>
            </div>

            <div>
                <span class="badge bg-success px-3 py-2">
                    {{ ucfirst($lead->status) }}
                </span>
            </div>
        </div>
    </div>

    <!-- 🔹 Action Button -->
    <div class="mb-3 text-end">
   
        <button class="btn btn-primary"
        data-toggle="modal"
        data-target="#exampleModal">
    + Add Follow-up
</button>
    </div>

    <!-- 🔹 Follow-up Timeline -->
    <div class="card p-3">
        <h5 class="mb-3">Follow-up Timeline</h5>

        @forelse($lead->followups as $f)
            <div class="d-flex mb-3">

                <!-- Timeline Dot -->
                <div class="me-3">
                    <span class="badge bg-primary rounded-circle p-2">●</span>
                </div>

                <!-- Content -->
                <div class="flex-grow-1 border rounded p-3">

                    <div class="d-flex justify-content-between">
                        <strong>{{ $f->user->name }}</strong>
                        <small>{{ $f->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="mt-1">
                        <span class="badge bg-info">{{ ucfirst($f->action_type) }}</span>
                        <span class="badge bg-success">{{ ucfirst($f->status) }}</span>
                    </div>

                    <p class="mt-2 mb-1">{{ $f->note }}</p>

                   <small class="text-muted">
                        {{ $f->next_followup_date 
                            ? \Carbon\Carbon::parse($f->next_followup_date)->format('d M Y, h:i A') 
                            : 'No follow-up scheduled' }}
                    </small>
                </div>
            </div>
        @empty
            <p class="text-muted">No follow-ups yet.</p>
        @endforelse

    </div>

</div>
<!-- 🔹 Follow-up Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
                <h5 class="modal-title">Add Follow-up</h5>

                <!-- ✅ FIXED CLOSE BUTTON -->
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
                                <option value="meeting">📅 Meeting</option>
                                <option value="email">📧 Email</option>
                                <option value="whatsapp">💬 WhatsApp</option>
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="col-md-12 mb-3">
                            <label>Lead Status</label>
                            <select name="status" class="form-control" required>
                                <option value="new">New</option>
                                <option value="contacted">Contacted</option>
                                <option value="interested">Interested</option>
                                <option value="not_interested">Not Interested</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>

                        <!-- Next Follow-up -->
                        <div class="col-md-12 mb-3">
                            <label>Next Follow-up Date & Time</label>
                         <input type="datetime-local"
       name="next_followup_date"
       class="form-control"
       value="{{ old('next_followup_date') }}">
                        </div>

                        <!-- Notes -->
                        <div class="col-md-12 mb-3">
                            <label>Notes</label>
                            <textarea name="note"
                                      rows="4"
                                      class="form-control"
                                      placeholder="Write follow-up details..."
                                      required></textarea>
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
@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">

    <div class="col-12 mb-3">
        <h4>Filter Leads</h4>
    </div>

    <div class="col-12 mb-4">
        <div class="card p-3">
            <form id="filterForm">
                <div class="row">

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                        <option value="">All Leads</option>
                        <option value="assigned">Assigned</option>
                        <option value="contacted">Contacted</option>
                        <option value="interested">Interested</option>
                        <option value="not_interested">Not Interested</option>                        
                        <option value="completed">Completed</option>
                        <option value="invalid">Invalid</option>
                        <option value="junk">Junk</option>
                        <option value="onboard">Onboard</option>
                    </select>
                    </div>

                    <div class="col-md-3">
                        <label>Sales Executive</label>
                        <select name="user_id" class="form-control">
                            <option value="">All Executives</option>
                            @foreach($salesExecutives as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>From Date</label>
                        <input type="date" name="from_date" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>To Date</label>
                        <input type="date" name="to_date" class="form-control">
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div class="col-12">
        <div class="card p-3">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Sales Executive</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="leadsTable">
                        <tr>
                            <td colspan="8" class="text-center">Loading...</td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    function fetchLeads() {
        $.ajax({
            url: "{{ route('filter.leads') }}",
            method: "GET",
            data: $('#filterForm').serialize(),
            success: function(response) {

                let rows = '';

                if(response.leads.length > 0) {

                    response.leads.forEach((lead, index) => {

                        let badgeClass = 'bg-secondary';

                        if (lead.status === 'assigned') badgeClass = 'bg-warning';
                        else if (lead.status === 'onboard') badgeClass = 'bg-success';
                        else if (lead.status === 'contacted') badgeClass = 'bg-info';
                        else if (lead.status === 'completed') badgeClass = 'bg-primary';
                        else if (lead.status === 'not_interested') badgeClass = 'bg-danger';

                        let viewUrl = "{{ route('leads.show', ':id') }}".replace(':id', lead.id);

                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${lead.name ?? '-'}</td>
                                <td>${lead.email ?? '-'}</td>
                                <td>${lead.phone ?? '-'}</td>
                                <td>${lead.user ? lead.user.name : '-'}</td>
                                <td>
                                    <span class="badge ${badgeClass}">
                                        ${lead.status ? lead.status.charAt(0).toUpperCase() + lead.status.slice(1) : '-'}
                                    </span>
                                </td>
                                <td>${lead.created_at ? new Date(lead.created_at).toLocaleDateString() : '-'}</td>
                                <td>
                                    <a href="${viewUrl}" class="btn btn-sm btn-primary">
                                        View
                                    </a>
                                </td>
                            </tr>
                        `;
                    });

                } else {
                    rows = `<tr><td colspan="8" class="text-center">No leads found</td></tr>`;
                }

                $('#leadsTable').html(rows);
            },
            error: function() {
                $('#leadsTable').html(`<tr><td colspan="8" class="text-danger text-center">Error loading data</td></tr>`);
            }
        });
    }

    $('#filterForm select, #filterForm input').on('change', function(){
        fetchLeads();
    });

    fetchLeads();

});
</script>

@endsection

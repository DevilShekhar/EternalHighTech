@extends('admin.layouts.app')

@section('content')

 <!-- SECTION 1 -->
       <section class="section premium-dashboard">
            <div class="premium-page-head">
                <div class="premium-page-title">
                    <span class="mini-badge">Admin Panel</span>
                    <h2>Dashboard Overview</h2>
                    <p>Monitor your leads and system performance in real-time.</p>
                </div>

                <div class="premium-head-actions">
                    <a href="{{ route('leads.index') }}" class="btn premium-btn primary-btn">
                        <i data-feather="list"></i> View Leads
                    </a>
                </div>
            </div>

            <div class="row premium-stats-row">

                {{-- Total Leads --}}
                <div class="col-xl-3 ">
                    <div class="card premium-top-card">
                        <div class="card-statistic-4">
                            <div class="row">
                                <div class="col-6 pt-3">
                                    <div class="card-content">
                                        <h5>Total Leads</h5>
                                        <h2 class="mb-3">{{ $totalLeads ?? 0 }}</h2>
                                        <p class="mb-0 text-muted">All time data</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="banner-img">
                                        <img src="{{ asset('assets/img/banner/1.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Today Leads --}}
                <div class="col-xl-3 ">
                    <div class="card premium-top-card">
                        <div class="card-statistic-4">
                            <div class="row">
                                <div class="col-6 pt-3">
                                    <div class="card-content">
                                        <h5>Today Leads</h5>
                                        <h2 class="mb-3">{{ $todayLeads ?? 0 }}</h2>
                                        <p class="mb-0 text-muted">Today's entries</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="banner-img">
                                        <img src="{{ asset('assets/img/banner/2.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Monthly Leads --}}
                <div class="col-xl-3 ">
                    <div class="card premium-top-card">
                        <div class="card-statistic-4">
                            <div class="row">
                                <div class="col-6 pt-3">
                                    <div class="card-content">
                                        <h5>This Month</h5>
                                        <h2 class="mb-3">{{ $thisMonthLeads ?? 0 }}</h2>
                                        <p class="mb-0 text-muted">Monthly growth</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="banner-img">
                                        <img src="{{ asset('assets/img/banner/3.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Completed Leads --}}
                <div class="col-xl-3 ">
                    <div class="card premium-top-card">
                        <div class="card-statistic-4">
                            <div class="row">
                                <div class="col-6 pt-3">
                                    <div class="card-content">
                                        <h5>Converted Leads</h5>
                                        <h2 class="mb-3">{{ $completedLeads ?? 0 }}</h2>
                                        <p class="mb-0 text-muted">Coming soon</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="banner-img">
                                        <img src="{{ asset('assets/img/banner/4.png') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- SECTION 2 -->
        <section class="section premium-dashboard pt-0">
          <div class="card premium-block quick-actions-card">
            <div class="card-header premium-card-header">
              <h4>Quick Actions</h4>
            </div>

            <div class="card-body">
              <div class="quick-actions-grid">
                <a href="upload-excel.html" class="quick-action-box">
                  <div class="quick-icon purple-bg">
                    <i data-feather="upload-cloud"></i>
                  </div>
                  <div>
                    <h5>Upload Excel</h5>
                    <p>Import bulk insurance data</p>
                  </div>
                </a>

                <a href="all-insurance.html" class="quick-action-box">
                  <div class="quick-icon green-bg">
                    <i data-feather="layers"></i>
                  </div>
                  <div>
                    <h5>View All Insurance</h5>
                    <p>Browse complete policy list</p>
                  </div>
                </a>

                <a href="expire-insurance.html" class="quick-action-box">
                  <div class="quick-icon orange-bg">
                    <i data-feather="alert-circle"></i>
                  </div>
                  <div>
                    <h5>Expire Insurance</h5>
                    <p>Policies already expired</p>
                  </div>
                </a>

                <a href="reexpire-insurance.html" class="quick-action-box">
                  <div class="quick-icon blue-bg">
                    <i data-feather="refresh-cw"></i>
                  </div>
                  <div>
                    <h5>Re-Expire Insurance</h5>
                    <p>Repeated expiry follow-up</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </section>

      @if(auth()->user()->role === 'sales_executive')

      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h4>Lead Follow-up Reminders</h4>

                      <a href="{{ route('reminders.list') }}" class="btn btn-primary">
                          View All
                      </a>
                  </div>

                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tr>
                                  <th>#</th>
                                  <th>Lead Name</th>
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

                                  <td>
                                      {{ $reminder->lead->name ?? 'N/A' }}
                                  </td>

                                  <td>
                                      {{ ucfirst($reminder->action_type ?? '-') }}
                                  </td>

                                  <td>
                                      <span class="badge badge-info">
                                          {{ ucfirst($reminder->status) }}
                                      </span>
                                  </td>

                                  <td>
                                      {{ $date->format('d M Y') }}
                                  </td>

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
                                  <td colspan="6" class="text-center">
                                      No reminders found
                                  </td>
                              </tr>
                              @endforelse

                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      @endif
      @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'sales_head'))

      <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                      <h4>Lead Follow-up Reminders</h4>

                      <a href="{{ route('reminders.list') }}" class="btn btn-primary">
                          View All
                      </a>
                  </div>

                  <div class="card-body p-0">
                      <div class="table-responsive">
                          <table class="table table-striped">
                              <tr>
                                  <th>#</th>
                                  <th>Lead Name</th>
                                  <th>Sales Person</th> {{-- NEW --}}
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

                                    {{-- SALES NAME --}}
                                    <td>{{ $reminder->user->name ?? 'N/A' }}</td>

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

      @endif
      @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'sales_head'))

        <div class="card mt-4">
            <div class="card-header">
                <h4>Closed Leads (Team Performance)</h4>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Lead Name</th>
                        <th>Closed By</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>

                    @forelse($closedLeads as $key => $lead)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $lead->lead->name ?? 'N/A' }}</td>
                        <td>{{ $lead->user->name ?? 'N/A' }}</td>
                        <td><span class="badge badge-success">Closed</span></td>
                        <td>{{ $lead->updated_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No closed leads</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>

        @endif
        @if(auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->role === 'sales_head'))

        <div class="card mt-4">
            <div class="card-header">
                <h4>Not Interested Leads</h4>
            </div>

            <div class="card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th>#</th>
                        <th>Lead Name</th>
                        <th>Sales By</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>

                    @forelse($notinLeads as $key => $lead)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $lead->lead->name ?? 'N/A' }}</td>
                        <td>{{ $lead->user->name ?? 'N/A' }}</td>
                        <td><span class="badge badge-danger">not interested</span></td>
                        <td>{{ $lead->updated_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Not Interested Leads</td>
                    </tr>
                    @endforelse
                </table>
            </div>
        </div>

        @endif
      @if(auth()->user()->role === 'sales_executive')

      <div class="card mt-4">
          <div class="card-header">
              <h4>My Closed Leads</h4>
          </div>

          <div class="card-body p-0">
              <table class="table table-striped">
                  <tr>
                      <th>#</th>
                      <th>Lead Name</th>
                      <th>Status</th>
                      <th>Date</th>
                  </tr>

                  @forelse($closedLeads as $key => $lead)
                  <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $lead->lead->name ?? 'N/A' }}</td>
                      <td><span class="badge badge-success">Closed</span></td>
                      <td>{{ $lead->updated_at->format('d M Y') }}</td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="4" class="text-center">No closed leads</td>
                  </tr>
                  @endforelse
              </table>
          </div>
      </div>

      @endif

      @if(auth()->user()->role === 'sales_executive')

      <div class="card mt-4">
          <div class="card-header">
              <h4>My Not Interested  Leads</h4>
          </div>

          <div class="card-body p-0">
              <table class="table table-striped">
                  <tr>
                      <th>#</th>
                      <th>Lead Name</th>
                      <th>Status</th>
                      <th>Date</th>
                  </tr>

                  @forelse($notinLeads as $key => $lead)
                  <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $lead->lead->name ?? 'N/A' }}</td>
                      <td><span class="badge badge-danger">not interested</span></td>
                      <td>{{ $lead->updated_at->format('d M Y') }}</td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="4" class="text-center">No not interested leads</td>
                  </tr>
                  @endforelse
              </table>
          </div>
      </div>

      @endif
      
@endsection

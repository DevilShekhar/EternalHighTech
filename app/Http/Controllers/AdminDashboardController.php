<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Lead;
use App\Models\LeadLog;
use App\Models\LeadFollowup;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin'  || $user->role === 'sales_head') {

            // Admin → ALL leads
            $totalLeads = Lead::count();
            $todayLeads = Lead::whereDate('created_at', today())->count();
            $thisMonthLeads = Lead::whereMonth('created_at', now()->month)->count();
            $completedLeads = Lead::where('status', 'closed')->count();
            $assignedLeads = Lead::count();
             // Admin → ALL reminders + sales user
            $reminders = LeadFollowup::with(['lead', 'user'])
            ->whereDate('next_followup_date', '<=', Carbon::today())
            ->whereHas('lead', function ($q) {
                $q->whereNotIn('status', ['closed', 'not_interested']);
            })
            ->orderBy('next_followup_date', 'asc')
            ->take(10)
            ->get();
            // Admin → all closed leads + sales user
            $closedLeads = LeadFollowup::with(['lead', 'user'])
                ->where('status', 'closed')
                ->latest()
                ->take(10)
                ->get();
             // Admin → all not_interested leads + sales user
            $notinLeads = LeadFollowup::with(['lead', 'user'])
                ->where('status', 'not_interested')
                ->latest()
                ->take(10)
                ->get();

        } elseif ($user->role === 'sales_executive') {

            // Sales Executive → ONLY OWN leads
            $totalLeads = Lead::where('user_id', $user->id)->count();
            $todayLeads = Lead::where('user_id', $user->id)->whereDate('created_at', today())->count();

            $thisMonthLeads = Lead::where('user_id', $user->id)->whereMonth('created_at', now()->month)->count();
            $completedLeads = Lead::where('user_id', $user->id)->where('status', 'closed')->count();
            $assignedLeads = Lead::where('user_id', $user->id)->count();
             // Sales → ONLY own reminders
            $reminders = LeadFollowup::with('lead')
                ->where('user_id', $user->id)
                ->whereDate('next_followup_date', '<=', Carbon::today())
                ->whereHas('lead', function ($q) {
                    $q->whereNotIn('status', ['closed', 'not_interested']);
                })
                ->orderBy('next_followup_date', 'asc')
                ->take(10)
                ->get();
                 // Sales → only own closed leads
            $closedLeads = LeadFollowup::with('lead')
                ->where('user_id', $user->id)
                ->where('status', 'closed')
                ->latest()
                ->take(10)
                ->get();
                // Sales → only own not_interested leads
            $notinLeads = LeadFollowup::with('lead')
                ->where('user_id', $user->id)
                ->where('status', 'not_interested')
                ->latest()
                ->take(10)
                ->get();
        }
        else {

            // Other roles (optional fallback)

        }
         // SALES EXECUTIVE DATA

        // 🔹 Recent Activities (logs)
        $activities = LeadLog::with('lead')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        
        return view('admin.dashboard', compact(
            'totalLeads',
            'todayLeads',
            'thisMonthLeads',
            'assignedLeads',
            'activities',
            'reminders',
            'closedLeads',
            'notinLeads',
            'completedLeads'
        ));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

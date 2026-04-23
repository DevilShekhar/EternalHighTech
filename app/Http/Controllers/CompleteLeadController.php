<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Lead;

use App\Models\LeadFollowup;
use Carbon\Carbon;

class CompleteLeadController extends Controller
{

    public function index()
    {
         $user = Auth::user(); //  get logged-in user

        $query = LeadFollowup::with(['lead', 'user'])
            ->where('status', 'onboard')
            ->latest();

        //  Apply role condition
        if ($user->role === 'sales_executive') {
            $query->where('user_id', $user->id);
        }

        $closedLeads = $query->get();
        return view('admin.completed.index', compact('closedLeads'));
    }
    public function show($id)
    {
        $user = Auth::user();

        $lead = Lead::with([
            'followups' => function ($query) {
                $query->orderBy('next_followup_date', 'desc'); // latest first
            },
            'followups.user'
        ])->findOrFail($id);

        //  Sales restriction
        if ($user->role === 'sales_executive' && $lead->user_id != $user->id) {
            abort(403);
        }
         //  New variable for logs (only for admin)
        $leadLogs = [];
        if ($user->role === 'admin') {
            $leadLogs = \DB::table('lead_logs')
                ->where('lead_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('admin.completed.show', compact('lead','leadLogs'));
    }
}
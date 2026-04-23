<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\LeadFollowup;
use Carbon\Carbon;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'sales_head') {
                $leads = Lead::where('status', 'assigned') //   only assigned
                ->latest()
                ->get();

        } else {

            $leads = Lead::where('user_id', Auth::id())
                ->where('status', 'assigned') //   only assigned
                ->latest()
                ->get();
        }

        return view('admin.leads.index', compact('leads'));
    }
    public function inprogress()
    {
        $statuses = ['contacted', 'interested'];

        if (Auth::user()->role === 'admin' || Auth::user()->role === 'sales_head') {

            $leads = Lead::whereIn('status', $statuses)
                ->latest()
                ->get();

        } else {

            $leads = Lead::where('user_id', Auth::id())
                ->whereIn('status', $statuses)
                ->latest()
                ->get();
        }

        return view('admin.leads.inprogress', compact('leads'));
    }
    public function show($id)
    {
        $user = Auth::user();

        $lead = Lead::with('followups.user')->findOrFail($id);

        // Security check
        if (
            $user->role !== 'admin' &&
            $user->role !== 'sales_head' &&
            $lead->user_id !== $user->id
        ) {
            abort(403);
        }

        // ✅ Get first followup where business/mobile exists
        $firstFollowup = LeadFollowup::where('lead_id', $lead->id)
            ->where(function ($q) {
                $q->whereNotNull('business_name')
                ->orWhereNotNull('alt_mobile');
            })
            ->first();

        // Lead logs
        $leadLogs = [];
        if ($user->role === 'admin') {
            $leadLogs = \DB::table('lead_logs')
                ->where('lead_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // ✅ PASS VARIABLE HERE
        return view('admin.leads.show', compact('lead', 'leadLogs', 'firstFollowup'));
    }
    public function storeFollowup(Request $request, $leadId)
    {
        $request->validate([
            'action_type' => 'required',
            'status' => 'required',
            'note' => 'required',
            'next_followup_date' => 'nullable|date',
            'business_name' => 'nullable|string|max:255',
            'alt_mobile' => 'nullable|string|max:20',
            'short_desc' => 'nullable|string',
        ]);

        $lead = Lead::findOrFail($leadId);

        // Security check
        if (
            !in_array(Auth::user()->role, ['admin', 'sales_head']) &&
            $lead->user_id !== Auth::id()
        ) {
            abort(403);
        }

        // ✅ Check if already saved once
        $firstFollowup = LeadFollowup::where('lead_id', $lead->id)
            ->where(function ($q) {
                $q->whereNotNull('business_name')
                ->orWhereNotNull('alt_mobile');
            })
            ->first();

        $nextFollowup = $request->filled('next_followup_date')
            ? Carbon::parse($request->next_followup_date)
            : null;

        LeadFollowup::create([
            'lead_id' => $lead->id,
            'user_id' => Auth::id(),
            'action_type' => $request->action_type,
            'status' => $request->status,
            'note' => $request->note,

            // ✅ Save only first time
            'business_name' => $firstFollowup ? null : $request->business_name,
            'alt_mobile' => $firstFollowup ? null : $request->alt_mobile,

            'short_desc' => $request->short_desc,
            'next_followup_date' => $nextFollowup,
        ]);

        $lead->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Follow-up saved successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function checkFollowups()
    {
        $now = Carbon::now();
        $oneHourLater = Carbon::now()->addHour();

        $followups = LeadFollowup::with('lead')
            ->where('user_id', Auth::id())
            ->where('reminder_sent', false)
            ->whereBetween('next_followup_date', [$now, $oneHourLater])
            ->get();

        if ($followups->count()) {

            foreach ($followups as $f) {
                $f->update(['reminder_sent' => true]);
            }

            return response()->json([
                'status' => true,
                'data' => $followups
            ]);
        }

        return response()->json(['status' => false]);
    }
    public function filterList(Request $request)
    {
        $query = Lead::with('user'); //  relationship load

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        //  filter by sales executive
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $leads = $query->latest()->get();

        //  get all sales executives
        $salesExecutives = \App\Models\User::where('role', 'sales_executive')->get();

        if ($request->ajax()) {
            return response()->json([
                'leads' => $leads
            ]);
        }

        return view('admin.leads.allleads', compact('leads', 'salesExecutives'));
    }
    
}

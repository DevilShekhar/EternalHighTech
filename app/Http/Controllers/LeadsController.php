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
        if (Auth::user()->role === 'admin') {
            $leads = Lead::latest()->get();
        } else {
            $leads = Lead::where('user_id', Auth::id())->latest()->get();
        }

        return view('admin.leads.index', compact('leads'));
    }
    public function show($id)
    {
        $lead = Lead::with('followups.user')->findOrFail($id);

        // security check (sales should see only their leads)
        if (Auth::user()->role !== 'admin' && $lead->user_id !== Auth::id()) {
            abort(403);
        }

        return view('admin.leads.show', compact('lead'));
    }
    public function storeFollowup(Request $request, $leadId)
    {
        $request->validate([
            'action_type' => 'required',
            'status' => 'required',
            'note' => 'required',
            'next_followup_date' => 'nullable|date',
        ]);

        $lead = Lead::findOrFail($leadId);

        // 🔐 Security check
        if (Auth::user()->role !== 'admin' && $lead->user_id !== Auth::id()) {
            abort(403);
        }

        // ✅ Convert datetime properly
        $nextFollowup = $request->filled('next_followup_date')
    ? Carbon::parse($request->next_followup_date)
    : null;

        LeadFollowup::create([
            'lead_id' => $lead->id,
            'user_id' => Auth::id(),
            'action_type' => $request->action_type,
            'status' => $request->status,
            'note' => $request->note,
            'next_followup_date' => $nextFollowup,
        ]);

        // ✅ Update lead status
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
}

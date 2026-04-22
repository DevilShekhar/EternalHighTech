<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Lead;

use App\Models\LeadFollowup;
use Carbon\Carbon;

class ReminderController extends Controller
{

   public function index()
{
    $user = Auth::user();

    if ($user->role === 'admin' || $user->role === 'sales_head') {
        $reminders = LeadFollowup::with(['lead', 'user'])
            ->whereHas('lead', function ($query) {
                $query->where('status', '!=', 'closed');
            })
            ->whereDate('next_followup_date', '<=', Carbon::today())
            ->orderBy('next_followup_date', 'asc')
            ->get();

    } elseif ($user->role === 'sales_executive') {
        $reminders = LeadFollowup::with('lead')
            ->where('user_id', $user->id)
            ->whereHas('lead', function ($query) {
                $query->where('status', '!=', 'closed');
            })
            ->whereDate('next_followup_date', '<=', Carbon::today())
            ->orderBy('next_followup_date', 'asc')
            ->get();
    } else {
        $reminders = collect(); // fallback to empty collection
    }

    return view('admin.reminders.index', compact('reminders'));
}
}
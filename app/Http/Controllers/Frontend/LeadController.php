<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use App\Models\LeadLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{
    // ✅ Show form
    public function create()
    {
        return view('frontend.leads.form');
    }

    // ✅ Store lead (UPDATED)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'services' => 'required|string|max:255',
            'budget' => 'required|string|max:255',
            'goal' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000',
        ]);

        // 🌍 IP + Location
        $ip = $request->getClientIp();
        $location = [];
        $lat = null;
        $lng = null;

        try {
            if ($ip !== '127.0.0.1' && $ip !== '::1') {
                $response = Http::timeout(3)->get("https://ipinfo.io/{$ip}/json");

                if ($response->successful()) {
                    $location = $response->json();

                    if (!empty($location['loc'])) {
                        [$lat, $lng] = explode(',', $location['loc']);
                    }
                }
            }
        } catch (\Exception $e) {}

        // 🔥 GET USERS
        $users = User::where('role', 'sales_executive')->orderBy('id')->get();

        if ($users->isEmpty()) {
            return back()->with('error', 'No sales users available');
        }

        // 🔥 FIND NEXT USER (ROUND ROBIN)
        $lastLead = Lead::whereNotNull('user_id')->latest()->first();

        if ($lastLead) {
            $currentIndex = $users->search(fn($u) => $u->id == $lastLead->user_id);
            $nextIndex = ($currentIndex + 1) % $users->count();
        } else {
            $nextIndex = 0;
        }

        $nextUser = $users[$nextIndex];

        // ✅ CREATE LEAD (ASSIGNED)
        Lead::create([
            'user_id' => $nextUser->id,
            'status' => 'pending',
            'notified_at' => now(),

            'name' => trim($request->name),
            'email' => trim($request->email),
            'phone' => trim($request->phone),
            'services' => trim($request->services),
            'budget' => trim($request->budget),
            'goal' => trim($request->goal),

            'business_name' => $request->business_name ? trim($request->business_name) : null,
            'message' => $request->message ? trim($request->message) : null,

            'ip_address' => $ip,
            'city' => $location['city'] ?? null,
            'state' => $location['region'] ?? null,
            'country' => $location['country'] ?? null,
            'zipcode' => $location['postal'] ?? null,

            'latitude' => $lat,
            'longitude' => $lng,
        ]);

        return back()->with('success', 'Thank you! We will contact you soon.');
    }

    // ✅ CHECK LEAD (ONLY ASSIGNED USER)
    public function checkLead()
    {
        if (!auth()->check()) {
            return response()->json(null);
        }

        $lead = Lead::where('status', 'pending')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$lead) {
            return response()->json(null);
        }

        // ✅ LOG VIEW
        try {
            $alreadyViewed = LeadLog::where([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'action' => 'viewed'
            ])->exists();

            if (!$alreadyViewed) {
                LeadLog::log($lead->id, auth()->id(), 'viewed');
            }
        } catch (\Exception $e) {}

        return response()->json([
            'id' => $lead->id,
            'name' => $lead->name,
            'phone' => $lead->phone,
            'services' => $lead->services,
            'budget' => $lead->budget,
        ]);
    }

    // ✅ ACCEPT LEAD
    public function acceptLead($id)
    {
        if (!auth()->check()) {
            return response()->json(['error' => 'Not logged in'], 401);
        }

        $lead = Lead::findOrFail($id);

        if ($lead->status === 'assigned') {
            return response()->json(['error' => 'Already assigned']);
        }

        $lead->user_id = auth()->id();
        $lead->status = 'assigned';
        $lead->save();

        // ✅ LOG
        try {
            LeadLog::log($lead->id, auth()->id(), 'accepted');
        } catch (\Exception $e) {}

        return response()->json([
            'success' => true,
            'user_id' => auth()->id()
        ]);
    }

    // ✅ SKIP LEAD → NEXT USER
    public function skipLead($id)
    {
        $lead = Lead::find($id);

        if (!$lead || $lead->status === 'assigned') {
            return response()->json(['error' => 'Invalid'], 400);
        }

        $users = User::where('role', 'sales_executive')->orderBy('id')->get();

        if ($users->isEmpty()) {
            return response()->json(['error' => 'No users']);
        }

        $currentIndex = $users->search(fn($u) => $u->id == $lead->user_id);

        $nextIndex = ($currentIndex + 1) % $users->count();

        $nextUser = $users[$nextIndex];

        $lead->user_id = $nextUser->id;
        $lead->notified_at = now();
        $lead->save();

        // ✅ LOG
        try {
            LeadLog::log($lead->id, auth()->id(), 'skipped');
        } catch (\Exception $e) {}

        return response()->json(['success' => true]);
    }
}

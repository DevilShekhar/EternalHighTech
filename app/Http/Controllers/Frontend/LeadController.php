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
            'status' => 'assigned',
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

        // ✅ Only sales users allowed
        if (auth()->user()->role !== 'sales_executive') {
            return response()->json(null);
        }

        $lead = Lead::where('status', 'assigned')
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$lead) {
            return response()->json(null);
        }

        // ✅ Prevent duplicate popup
        $alreadyViewed = LeadLog::where([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'action' => 'viewed'
        ])->exists();

        if ($alreadyViewed) {
            return response()->json(null);
        }

        LeadLog::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'action' => 'viewed'
        ]);

        return response()->json([
            'id' => $lead->id,
            'name' => $lead->name,
            'phone' => $lead->phone,
            'services' => $lead->services,
            'budget' => $lead->budget,
        ]);
    }

}

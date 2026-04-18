<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
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
        } catch (\Exception $e) {
            $location = [];
        }

        // ✅ CREATE LEAD (NO USER ASSIGN HERE)
        Lead::create([
            'user_id' => null,
            'status' => 'pending',
            'current_user_index' => 0,
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


    // ✅ CHECK LEAD (for popup + rotation)
 public function checkLead()
{
    $lead = Lead::where('status', 'pending')->latest()->first();

    if (!$lead) {
        return response()->json(null);
    }

    $users = User::where('role', 'sales_executive')->orderBy('id')->get();

    if ($users->isEmpty()) {
        return response()->json(null);
    }

    $totalUsers = $users->count();

    // ⏱ AUTO ROTATE AFTER 5 MIN
    if ($lead->notified_at && now()->diffInSeconds($lead->notified_at) >= 300) {

        $lead->current_user_index++;

        if ($lead->current_user_index >= $totalUsers) {
            $lead->current_user_index = 0;
        }

        $lead->notified_at = now();
        $lead->save();
    }

    $currentUser = $users[$lead->current_user_index] ?? null;

    if ($currentUser && auth()->check() && auth()->id() == $currentUser->id) {

        return response()->json([
            'id' => $lead->id,
            'name' => $lead->name,
            'phone' => $lead->phone,
            'services' => $lead->services,
            'budget' => $lead->budget,
        ]);
    }

    return response()->json(null);
}

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

    return response()->json([
        'success' => true,
        'user_id' => auth()->id()
    ]);
}
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

    $lead->current_user_index++;

    if ($lead->current_user_index >= $users->count()) {
        $lead->current_user_index = 0;
    }

    $lead->notified_at = now(); // reset timer
    $lead->save();

    return response()->json(['success' => true]);
}
}
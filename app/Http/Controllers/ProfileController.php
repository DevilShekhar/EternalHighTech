<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'mobile_number' => 'nullable',
        'address' => 'nullable',
        'gender' => 'nullable',
        'date_of_birth' => 'nullable',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'mobile_number' => $request->mobile_number,
        'address' => $request->address,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
    ];

    // HANDLE IMAGE
    if ($request->hasFile('profile_photo')) {

        $file = $request->file('profile_photo');
        $filename = time().'_'.$file->getClientOriginalName();
        $path = $file->storeAs('profile_photos', $filename, 'public');

        $data['profile_photo'] = $path;
    }

    $user->update($data);

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
}
}
